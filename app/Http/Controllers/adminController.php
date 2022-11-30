<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\AboutPage;
use App\Models\ContactPage;
use Carbon\Carbon;



class adminController extends Controller
{
    public function Admin() {
        return view('admin.index');
    }
//    user logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $logoutNotification = array('message' => 'User logout successfully','alert-type' => 'warning');
        
        return redirect('/login')->with($logoutNotification);
    }// end method
    
    
//    get user details to user profile page
    public function profile(){
        $id = Auth::user() -> id;//get user id
        $adminData = User::find($id);
//        $role = userRole::find($roleID);
        return view('admin.admin_profile_view',compact('adminData'));
    }// end method
    //
//    get user details to side bar
//    public function sideBar(){
//        $id = Auth::user() -> id;//get user id
//        $sideadminData = User::find($id);
//        return view('admin.body.side-bar',compact('sideadminData'));
//    }// end method
    
//    get user details to user edit page
    public function editProfile(){
        $id = Auth::user() -> id;//get user id
        $editData = User::find($id);
        $fileName = "";
        return view('admin.admin_profile_edit',compact('editData','fileName'));
    }// end method

//    user image crop system in edit profile page
    public function crop(Request $request) {
        $id = Auth::user() -> id;//get user id
        $data = User::find($id);
        $path = 'image/upload/admin_update_image/'; //define path
        $userName = $data->name; //get user name
        $file = $request->file('profile_image');
        $fileName = 'NG-International-UIMG'.'-'.$userName.'-'.date('Y-m-d-H-i-s-').uniqid().'.png';
//        $fileName = 'NG-International-UIMG'.'-'.date('Y-m-d-H-i-s-').uniqid().'.png';
        $move = $file->move(public_path($path), $fileName);
        
//        checking the file path is work or not
        if(!$move){
            return response()->json(['status' => 0, 'msg' => 'Somthing went worng']);
            
        }
        else {
//            delete old image if existed
            $imageName = $data->profile_image;
            if($imageName != ''){
                unlink($path.$imageName);// removing the current file and store new one
            }
//            update new user image
            $data['profile_image'] = $fileName; // store the file name in db
            $data->save(); // saving data
            return response()->json(['status'=>1 , 'msg'=>$fileName, 'name'=>$fileName]);

        }
        
    }// end method
    
//    user profile image and details update
    public function storeProfile(Request $request){
        $id = Auth::user() -> id;//get user id
        $data = User::find($id);
        $path = 'image/upload/admin_update_image/'; //define path
        
        
//        $imageName = $path.$data->profile_image;
//        if($imageName != ''){
//            unlink($path.$imageName);// removing the current file and store new one
//        }
        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->role_id = $request->role_id;
        
/*        this code section is commented because, for the user image i used public method called "crop" it above this method
        
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_update_image'),$filename);
            $data['profile_image'] = $filename;
        }
 */
        
        $data->save();
        
        $notification = array('message' => 'Admin profile updated successfully','alert-type' => 'success');
        return redirect()->route('admin.profile')->with($notification);
    }// end method
    
//    redirecting to the change password page
    public function changePassword(){
        return view('admin.admin_change_password');
    }// end method
    
//    change password
    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'currentPassword' => 'required', //get current password
            'newPassword' => 'required', // get new password
            'confirmPassword' => 'required|same:newPassword', // confirm password with new password
        ]);
        
        $hashedPassword = Auth::user()->password;// get hashed password
        if(Hash::check($request->currentPassword,$hashedPassword)){// checking typed password in current field whether match with db or not
            $users = User::find(Auth::id());
            $users -> password = bcrypt($request->newPassword);
            $users -> save();
            session()->flash('message','Password is successfully updated.');
            return redirect()->back();
        }
        else{
            session()->flash('message','The current password is not matched.');
            return redirect()->back();
        }
    }// end method
    
//    admin about form page
    public function adminAbout() {
        $pageID = 1;
        $row = AboutPage::findOrFail($pageID);
        $id = Auth::user() -> id;//get user id
//        $roleID = Auth::userRole()->id;
        $adminData = User::find($id);
//        $role = userRole::find($roleID);
        return view('admin.admin_about',compact('adminData','row'));
    }
//    admin contact form page
    public function adminContact() {
        $id = Auth::user() -> id;//get user id
//        $roleID = Auth::userRole()->id;
        $adminData = User::find($id);
//        $role = userRole::find($roleID);
        return view('admin.admin_contact',compact('adminData'));
    }
    
//    update about page
    public function updateAbout(Request $request){
        $pageID = 1;//page id
        
//        check whether file input has file
        if($request->hasFile('file')){
//            find the row
            $row = AboutPage::findOrFail($pageID);//find row
//            define path
            $path = 'image/upload/about_page/';
//            get title
            $title = $request->title;
//            get sub title
            $sub_title = $request->sub_title;
//            get content
            $content = $request->content;
            
//            get file from file input
            $file = $request->file('file');
//            rename file name
            $filename = hexdec(uniqid()).'-NG-International-about-us-image.'.$file->getClientOriginalExtension();
            
//            move to the public path
            $move = $file->move(public_path($path),$filename);
            $filepath = $path.$filename;
            
//            check file move
            if(!$move){
                $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
            else{
//                delete old image of the row
                $oldImage = $row->image;
                if($oldImage != ""){
                    unlink($oldImage);//delete old image
                }
                
//                update data with image
                $row->update([
                    'title'=>$title,
                    'sub_title'=>$sub_title,
                    'image'=>$filepath,
                    'content'=>$content,
                ]);
                    
//                save row
                $row->save(); // saving data
//                success notification
                $notification = array('message' => 'About page successfully updated with image','alert-type' => 'success');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
        }
        else{
//            get row
            $row = AboutPage::findOrFail($pageID);//find row
//            get title
            $title = $request->title;
//            get sub title
            $sub_title = $request->sub_title;
//            get content
            $content = $request->content;
            
//            update data without image
            $row->update([
                'title'=>$title,
                'sub_title'=>$sub_title,
                'content'=>$content,
            ]);
            
//            save row
            $row->save(); // saving data
//            success notification
            $notification = array('message' => 'About page successfully updated without image','alert-type' => 'success');//generate notification
            return redirect()->back()->with($notification);//return to the home slide page with notification
        }
    }
//    end update about page
    
//    update contact page
    public function updateContact(Request $request){
        
//        define page id
        $id = 1;
        
//        get title
        $title = $request->title;
//        get sub title
        $sub_title = $request->sub_title;
//        get content
        $content = $request->content;
//        get address
        $address = $request->search_address;
//        get latitude
        $latitude = $request->latitude;
//        get longitude
        $longitude = $request->longitude;
//        get city
        $city = $request->city;
//        find row
        $row = ContactPage::findOrFail($id);
        
//        check whether file input has file
        if($request->hasFile('file')){
//            define path
            $path = 'image/upload/contact_page/';
//            get file
            $file = $request->file('file');
//            rename file
            $filename = hexdec(uniqid()).'NG-International-Contact-Page-Image.'.$file->getClientOriginalExtension();
//            move to the public path
            $move = $file->move(public_path($path),$filename);
//            define file path
            $filepath = $path.$filename;
            
//            check whether file move
            if(!$move){
//                error notification
                $notification = array('message' => 'Images dose not move to the directory','alert-type' => 'denger');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
            else{
//                check old image of the row
                $oldImage = $row->image;
                if($oldImage != ""){
                    unlink($oldImage);
                }
                
//                update data with image
                $row->update([
                    'title'=>$title,
                    'sub_title'=>$sub_title,
                    'content'=>$content,
                    'image'=>$filepath,
                    'address'=>$address,
                    'latitude'=>$latitude,
                    'longitude'=>$longitude,
                    'city'=>$city,
                ]);
                
//                save data
                $row->save();
                
//                success notification
                $notification = array('message' => 'About page successfully updated with image','alert-type' => 'success');//generate notification
                return redirect()->back()->with($notification);//return to the home slide page with notification
            }
            
        }
        else{
//            update without image
            
            $row->update([
                'title'=>$title,
                'sub_title'=>$sub_title,
                'content'=>$content,
                'address'=>$address,
                'latitude'=>$latitude,
                'longitude'=>$longitude,
                'city'=>$city,
            ]);
            
//            save data
            $row->save();
//            success notification
            $notification = array('message' => 'About page successfully updated without image','alert-type' => 'success');//generate notification
            return redirect()->back()->with($notification);//return to the home slide page with notification
        }
        
    }
//    end contact update
    
//    route for role view page
    public function adminRoleManagement() {
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
//        get all role
        $role = Role::orderBy('created_at' , 'desc')->get();
        return view('admin.role_management.view_all_role', compact('role','user'));
    }
//    end route
    
//    route for add new role
    public function adminRoleAdd() {
//        get all permission
        $permissions = Permission::all();
        return view('admin.role_management.add_role', compact('permissions'));
    }
//    end route
    
    public function adminRoleStore(Request $request) {
//        validate new role details
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'permission' => 'required',
        ],[
            'name.required' => 'Role name is required!',
            'display_name.required' => 'Role display name is required!',
            'description.required' => 'Role description is required!',
            'permission.require' => 'Role permission atleast has to be one checked permission'
        ]);
        
//        get role name
        $name = $request->name;
//        get role description
        $description = $request->description;
        
        $display_name = ucfirst($request->display_name);
        
        if(Role::where('display_name','LIKE','%'.$name.'%')->orWhere('name','LIKE','%'.$name.'%')->count() > 0){
            
            $notification = array('message' => 'Role name is already inserted','alert-type' => 'error');//generate notification
            return redirect()->back()->with($notification);//return to the home slide page with notification
        }
        else{
            
            Role::insert([
                'name' => $name,
                'display_name' => $display_name,
                'description' => $description,
                'created_at' => Carbon::now(),
            ]);
            
            $notification = array('message' => 'New role inserted successfully','alert-type' => 'success');//generate notification
            return redirect()->route('admin.role.management')->with($notification);//return to the home slide page with notification
        }
    }
    
    public function adminRoleEdit($id) {
        $role = Role::findOrFail($id);
        $permissions = DB::table('permissions')->crossJoin('permission_role')->where('permission_role.role_id',$id)->get();
        $count = DB::table('permissions')->crossJoin('permission_role')->where('permission_role.role_id',$id)->count();
        $new_permissions = Permission::all();
        return view('admin.role_management.edit_role', compact('role','permissions','count','new_permissions'));
    }
    
    public function adminRoleUpdate(Request $request,$id) {
        $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'display_name'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string', 'max:255'],
            'permission'=>'required',
        ],[
           'name.required'=>'Role name cannot be empty!', 
           'display_name.required'=>'Role display name cannot be empty!', 
           'description.required'=>'Role description cannot be empty!', 
           'permission.required'=>'Role permissions cannot be empty, atleast one has to be checked!', 
        ]);
        
        Role::findOrFail($id)->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
            'updated_at'=>Carbon::now(),
        ]);
        
        $count = DB::table('permission_role')->where('role_id',$id)->count();
        
        $allow_permissions_array = $request->permission;
        
        $allow_permission = implode(',',$allow_permissions_array);
        
        
        if($count > 0){
            DB::table('permission_role')
                    ->where('role_id',$id)
                    ->update([
                        'permission_identities' => $allow_permission,
                    ]);

        }
        else {
            DB::table('permission_role')
                    ->insert([
                        'permission_identities' => $allow_permission,
                        'role_id' => $id,
                    ]);
        }
        
        $notification = array('message' => 'Role updated successfully','alert-type' => 'success');//generate notification
        return redirect()->route('admin.role.management')->with($notification);//return to the home slide page with notification
    }
    
    public function adminRoleDelete($id) {
        
        DB::table('permission_role')->where('role_id',$id)->delete();
        Role::findOrFail($id)->delete();
        
        $notification = array('message' => 'Role deleted successfully','alert-type' => 'success');//generate notification
        return redirect()->route('admin.role.management')->with($notification);//return to the home slide page with notification
    }
    
    public function adminViewAllRollPermissions() {
        $id = Auth::user() -> id;//get user id
        $user = User::find($id);
        $permissions = Permission::orderBy('created_at' , 'desc')->get();
        return view('admin.role_management.view_permission_all',compact('permissions','user'));
    }
    
    public function adminEditRolePermission($id) {
        $permission = Permission::findOrFail($id);
        return view('admin.role_management.edit_role_permission',compact('permission'));
    }
    
    public function adminUpdateRolePermission(Request $request,$id) {
        $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'display_name'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string', 'max:255'],
        ],[
           'name.required'=>'Permission name cannot be empty!', 
           'display_name.required'=>'Permission display name cannot be empty!', 
           'description.required'=>'Permission description cannot be empty!', 
        ]);
        
        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'display_name' => ucfirst($request->display_name),
            'description' => $request->description,
        ]);
        
        $notification = array('message' => 'Permission updated successfully','alert-type' => 'success');//generate notification
        return redirect()->route('admin.view.all.role.permissions')->with($notification);//return to the home slide page with notification
    }
    
    public function adminDeleteRolePermission($id) {
        DB::table('permissions')->where('id',$id)->delete();
        $notification = array('message' => 'Permission deleted successfully','alert-type' => 'success');//generate notification
        return redirect()->route('admin.view.all.role.permissions')->with($notification);//return to the home slide page with notification
    }
    
    public function adminAddNewRolePermission() {
        return view('admin.role_management.add_new_role_permission');
    }
    
    public function adminStoreRolePermission(Request $request) {
        $request->validate([
            'name'=>['required', 'string', 'max:255', 'unique:permissions'],
            'display_name'=>['required', 'string', 'max:255', 'unique:permissions'],
            'description'=>['required', 'string', 'max:255'],
        ],[
           'name.required'=>'Permission name cannot be empty!', 
           'display_name.required'=>'Permission display name cannot be empty!', 
           'description.required'=>'Permission description cannot be empty!',  
        ]);
        
        Permission::insert([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array('message' => 'New permission inserted successfully','alert-type' => 'success');//generate notification
        return redirect()->route('admin.view.all.role.permissions')->with($notification);//return to the home slide page with notification
    }
}//end class
