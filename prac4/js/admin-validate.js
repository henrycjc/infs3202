var options = {
    autoOpen: false,
    height: 700,
    width: 500,
    show: {
        effect: "blind",
        duration: 1000
    },
    hide: {
        effect: "explode",
        duration: 1000
    }
};
var opts0 = { rules: {
                name0: {required: true, minlength: 4},
                address0: {required: true, minlength: 4},
                phone0: {required: true, minlength: 4},
                images0: {required: true, minlength: 4},
                desc0: {required: true, minlength: 4}
            }
        };
var opts1 = { rules: {
                name1: {required: true, minlength: 4},
                address1: {required: true, minlength: 4},
                phone1: {required: true, minlength: 4},
                images1: {required: true, minlength: 4},
                desc1: {required: true, minlength: 4}
            }
        };
var opts2 = { rules: {
                name2: {required: true, minlength: 4},
                address2: {required: true, minlength: 4},
                phone2: {required: true, minlength: 4},
                images2: {required: true, minlength: 4},
                desc2: {required: true, minlength: 4}
            }
        };
var opts3 = { rules: {
                name3: {required: true, minlength: 4},
                address3: {required: true, minlength: 4},
                phone3: {required: true, minlength: 4},
                images3: {required: true, minlength: 4},
                desc3: {required: true, minlength: 4}
            }
        };    

$(document).ready(function() {
    $("#dialog0").dialog(options);
    $("#dialog1").dialog(options);
    $("#dialog2").dialog(options);
    $("#dialog3").dialog(options);

    $("#edit0").click(function() {
        console.log("clicked");
        $("#dialog0").dialog("open");
    });
    $("#edit1").click(function() {
        console.log("clicked");
        $("#dialog1").dialog("open");
    });
    $("#edit2").click(function() {
        console.log("clicked");
        $("#dialog2").dialog("open");
    });
    $("#edit3").click(function() {
        console.log("clicked");
        $("#dialog3").dialog("open");
    });
   
    $('#form0').validate(opts0);
    $('#form1').validate(opts1);
    $('#form2').validate(opts2);
    $('#form3').validate(opts3);
});