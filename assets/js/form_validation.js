$(document).ready(function () {

    console.log("Form validation working correctly");

})

// class which validate fields

class FormValidation {

    constructor(value, errorText, regExp, id) {

        this.value = value;
        this.errorText = errorText;
        this.regExp = regExp;
        this.id = id;

    }

    validation() {

        if (this.regExp.test(this.value)) {
            $(this.id).next(".error").text("");
        }
        else if (this.value == "") {
            $(this.id).next(".error").text("");
        }
        else {
            $(this.id).next(".error").text(this.errorText);
        }

    }

}

// fields for validation

const fileds_for_validation = [

    {
        id: "#nameId",
        errorText: "Characters are allowed and 2 min character",
        regExp: /^[a-zA-Z ]{3,50}$/,
    },
    {
        id: "#emailId",
        errorText: "Invalid email",
        regExp: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,30}$/,
    },
    {
        id: "#passwordId",
        errorText: "1 Uppercase , 1 special character , min length 8 is required and max length is 15",
        regExp: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!%*?&]{8,15}$/,
    },
    {
        id: "#phoneId",
        errorText: "Invaid phone number",
        regExp: /^[0-9]{10}$/,
    },
    {
        id: "#imageId",
        errorText: "Invalid format",
        regExp: /(\.jpg|\.jpeg|\.png|\.gif)$/i,
    },
    {
        id: "",
        name_: "languages",
    },
    {
        id: "",
        name_: "gender",
    },


];

// here data goes and create object for class

fileds_for_validation.map(ele => {

    if (!ele.id == "") {

        $(ele.id).on('input', function () {

            let value = $(ele.id).val().trim();

            let validateObj = new FormValidation(value, ele.errorText, ele.regExp, ele.id);

            validateObj.validation();

        })

    }
    else {

        $(`input[name=${ele.name_}]`).on('input', function () {
            if ($(`input[name=${ele.name_}]:checked`).length > 0) {
                $(".check-error").text("");
            }
            else {
                $(".check-error").text("field is required");
                console.log("bad");
            }
        });

    }


})

var baseUrl = $("#baseUrlId").val();

// Adding form data into datable 

function sendData() {


    




    let formData = new FormData(tableData);

    // console.log(formdata);

    $.ajax({

        url: baseUrl + "insertcontroller/insert",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            $(".error").text("");
            $('.image-error').text("");

            for(let i = 0 ; i < data.errorKeys.length ; i++){

                $(`input[name="${data.errorKeys[i]}"]`).next().text(data.errorValues[i]) ;

                if(data.errorKeys[i].indexOf("[]") >= 0){
                    $(`input[name="${data.errorKeys[i]}"]`).closest('.form-check').parent().find('small').text(data.errorValues[i]);
                    console.log("comming []")
                }

                // $(`input[name="${data.errorKeys[i]}"]`).parents().next().text(data.errorValues[i]);
                if(data.errorValues[i]==""){
                    $(`input[name="${data.errorKeys[i]}"]`).next().text("Field is required")
                }

            }

        }

    })





}
