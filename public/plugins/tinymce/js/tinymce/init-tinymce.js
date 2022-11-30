tinymce.init({
    /* replace textarea having class .tinymce with tinymce editor */
    selector: "textarea",

    /* theme of the editor */
    theme: "modern",
    skin: "lightgray",

    /* width and height of the editor */
    width: "auto",
    height: 300,

    /* display statusbar */
    statubar: true,

    /* plugin */
    plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
    ],

    /* toolbar */
    toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
    
    /*import styles*/
    content_style:  "@import url('https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=BhuTuka+Expanded+One&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Square+Peg&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Tiro+Gurmukhi:ital@1&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=DynaPuff&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Rubik+Distressed&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');\n\
                    @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Silkscreen:wght@400;700&display=swap');",
    
    /*fonts*/
    font_formats:   "Aboreto = 'Aboreto', cursive;\n\
                    Alumni Sans Inline One = 'Alumni Sans Inline One', cursive;\n\
                    Andale Mono=andale mono,times; \n\
                    Arial=arial,helvetica,sans-serif; \n\
                    Arial Black=arial black,avant garde; \n\
                    BhuTuka Expanded One = 'BhuTuka Expanded One', cursive;\n\
                    Book Antiqua=book antiqua,palatino; \n\
                    Comic Sans MS=comic sans ms,sans-serif; \n\
                    Courier New=courier new,courier; \n\
                    Dancing Script = 'Dancing Script', cursive;\n\
                    DynaPuff = 'DynaPuff', cursive;\n\
                    EB Garamond = 'EB Garamond', serif;\n\
                    Georgia=georgia,palatino; \n\
                    Helvetica=helvetica; \n\
                    Impact=impact,chicago; \n\
                    Lobster = 'Lobster', cursive;\n\
                    Mouse Memoirs = 'Mouse Memoirs', sans-serif;\n\
                    Oswald=oswald; \n\
                    Pacifico = 'Pacifico', cursive;\n\
                    Raleway = 'Raleway', sans-serif;\n\
                    Rubik Distressed = 'Rubik Distressed', cursive;\n\
                    Rubik Dirt = 'Rubik Dirt', cursive;\n\
                    Silkscreen = 'Silkscreen', cursive;\n\
                    Symbol=symbol; \n\
                    Tahoma=tahoma,arial,helvetica,sans-serif; \n\
                    Terminal=terminal,monaco; \n\
                    Times New Roman=times new roman,times;\n\
                    Tiro Gurmukhi = 'Tiro Gurmukhi', serif;\n\
                    Trebuchet MS=trebuchet ms,geneva; \n\
                    Verdana=verdana,geneva; \n\
                    Webdings=webdings; \n\
                    Wingdings=wingdings,zapf dingbats;",

    /*font sizing*/
    fontsize_formats: "6pt 8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 36pt 46pt 56pt 66pt 100pt",

    /* style */
    style_formats: [
        {title: "Headers", items: [
                {title: "Header 1", format: "h1"},
                {title: "Header 2", format: "h2"},
                {title: "Header 3", format: "h3"},
                {title: "Header 4", format: "h4"},
                {title: "Header 5", format: "h5"},
                {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
                {title: "Bold", icon: "bold", format: "bold"},
                {title: "Italic", icon: "italic", format: "italic"},
                {title: "Underline", icon: "underline", format: "underline"},
                {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                {title: "Superscript", icon: "superscript", format: "superscript"},
                {title: "Subscript", icon: "subscript", format: "subscript"},
                {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
                {title: "Paragraph", format: "p"},
                {title: "Blockquote", format: "blockquote"},
                {title: "Div", format: "div"},
                {title: "Pre", format: "pre"}
        ]},
        {title: "Alignment", items: [
                {title: "Left", icon: "alignleft", format: "alignleft"},
                {title: "Center", icon: "aligncenter", format: "aligncenter"},
                {title: "Right", icon: "alignright", format: "alignright"},
                {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]}
    ]
});
