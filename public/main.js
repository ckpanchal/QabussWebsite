// Image Section

  // Add User Image
  function User(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#userImg')
            .attr('src', e.target.result)
            .width(180)
            .height(180);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
// Add User Image

// Add event/Offer Image
  function offer(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#offerimg')
            .attr('src', e.target.result)
            .width(360)
            .height(250);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
// Add event/Offer Image

// Add Category Image
  function read(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cateImg')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
// Add Category Image

// Add Qatar Image
  function qatarImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#qatarImage')
            .attr('src', e.target.result)
            .width(360)
            .height(250);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
// Add Qatar Image

// Add News Image
function newsImg(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#imageset')
          .attr('src', e.target.result)
          .width(360)
          .height(250);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
// Add News Image

// Image Section


// Numeric Validate

function ValidateNumber(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

// Numeric Validate


// Form Validation

// Form Validation Add User

  function validateUser(form)
  {
    if(form.username.value=="") {
      alert("Error: Please Enter The User Name!");
      form.username.focus();
      return false;
    }
    if(form.emailid.value=="") {
      alert("Error: Please Enter The User Email Id!");
      form.emailid.focus();
      return false;
    }
    if(form.companyphonenumber.value=="") {
      alert("Error: Please Enter The User Phone Number!");
      form.companyphonenumber.focus();
      return false;
    }
    if(form.password.value=="") {
      alert("Error: Please Enter The Passwordr!");
      form.password.focus();
      return false;
    }
    if(form.cnfmpassword.value=="") {
      alert("Error: Please Enter Confirm Password!");
      form.cnfmpassword.focus();
      return false;
    }
    if(form.cnfmpassword.value!=form.password.value) {
      alert("Error: Please Enter proper Password!");
      form.cnfmpassword.focus();
      return false;
    }
    if(form.image.value=="") {
      alert("Error: Please Select The Image!");
      form.image.focus();
      return false;
    }

  }

// Form Validation Add User

// Form Validation Edit User

  function validateEditUser(form)
  {
    if(form.username.value=="") {
      alert("Error: Please Enter The User Name!");
      form.username.focus();
      return false;
    }
    if(form.emailid.value=="") {
      alert("Error: Please Enter The User Email Id!");
      form.emailid.focus();
      return false;
    }
    if(form.phonenumber.value=="") {
      alert("Error: Please Enter The User Phone Number!");
      form.phonenumber.focus();
      return false;
    }
  }

// Form Validation Edit User

// Form Validation Add Category

  function validateCate(form)
  {
    if(form.categoryname.value=="") {
      alert("Error: Please Enter The Category Name(English)!");
      form.categoryname.focus();
      return false;
    }
    if(form.categorynamearb.value=="") {
      alert("Error: Please Enter The Category Name(Arabic)!");
      form.categorynamearb.focus();
      return false;
    }
    
    if(form.cateimage.value=="") {
      alert("Error: Please Select The Category Image!");
      form.cateimage.focus();
      return false;
    }
  }

// Form Validation Add Category

  // Form Validation Edit Category

  function validateEditCate(form)
  {
    if(form.categoryname.value=="") {
      alert("Error: Please Enter The Category Name(English)!");
      form.categoryname.focus();
      return false;
    }
    if(form.categorynamearb.value=="") {
      alert("Error: Please Enter The Category Name(Arabic)!");
      form.categorynamearb.focus();
      return false;
    }

  }

// Form Validation Edit Category

// Form Validation Edit Category

  function validateCateTag(form)
  {
    if(form.tagname.value=="") {
      alert("Error: Please Enter The Category Tag Name(English)!");
      form.tagname.focus();
      return false;
    }
    if(form.tagnamearb.value=="") {
      alert("Error: Please Enter The Category Tag Name(Arabic)!");
      form.tagnamearb.focus();
      return false;
    }
    // var ddlFruits = $("#Parentcategory");
    // if (ddlFruits.val() == "") {
    //   alert("Error: Please Select The Main Category!");
    //   form.Parentcategory.focus();
    //   return false;
    // }
    var year = $('#Parentcategory option:selected').val();
    if(year == "")
    {
    alert("Error: Please Select The Main Category!");
    form.Parentcategory.focus();
    return false;
    }
  }

// Form Validation Add Category



// Form Validation Add Offer

  function validateOffer(form)
  {
    if(form.offername.value=="") {
      alert("Error: Please Enter The Offer Name( English )!");
      form.offername.focus();
      return false;
    }
    if(form.offernamearb.value=="") {
      alert("Error: Please Enter The Offer Name( Arabic )!");
      form.offernamearb.focus();
      return false;
    }
    if(form.start.value=="") {
      alert("Error: Please Select The Start Date!");
      form.start.focus();
      return false;
    }
    if(form.end.value=="") {
      alert("Error: Please Select The End Date!");
      form.end.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Description( English )!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditor1").getContent();
    if (content == '') {
    alert("Please Enter The Page Description ( Arabic )!");
    tinyMCE.get('texteditor1').focus();
    return false;
    }
    if(form.location.value=="") {
        alert("Error: Please Enter The Location( English )!");
        form.location.focus();
        return false;
    }
    if(form.locationarb.value=="") {
        alert("Error: Please Enter The Location( Arabic )!");
        form.locationarb.focus();
        return false;
    }
    if(form.latitude.value=="") {
        alert("Error: Please Enter The Location Latitude!");
        form.latitude.focus();
        return false;
    }
    if(form.longitude.value=="") {
        alert("Error: Please Enter The Location Longitude!");
        form.longitude.focus();
        return false;
    }
    if(form.url.value=="") {
        alert("Error: Please Enter The Offer Url!");
        form.url.focus();
        return false;
    }
    if(form.image.value=="") {
      alert("Error: Please Select The Image!");
      form.image.focus();
      return false;
    }
  }

// Form Validation Add Offer

// Form Validation Edit Offer

  function validateEditOffer(form)
  {
    if(form.offername.value=="") {
      alert("Error: Please Enter The Offer Name(English)!");
      form.offername.focus();
      return false;
    }
    if(form.offernamearb.value=="") {
      alert("Error: Please Enter The Offer Name(Arabic)!");
      form.offernamearb.focus();
      return false;
    }
    if(form.start.value=="") {
      alert("Error: Please Select The Start Date!");
      form.start.focus();
      return false;
    }
    if(form.end.value=="") {
      alert("Error: Please Select The End Date!");
      form.end.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Description!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditor1").getContent();
    if (content == '') {
    alert("Please Enter The Page Description Arabic!");
    tinyMCE.get('texteditor1').focus();
    return false;
    }
  }

// Form Validation Edit Offer

// Form Validation Add Offer Tag

function validateOfferTag(form)
{
  if(form.tagname.value=="") {
    alert("Error: Please Enter The Offer Tag Name(English)!");
    form.tagname.focus();
    return false;
  }
  if(form.tagnamearb.value=="") {
    alert("Error: Please Enter The Offer Tag Name(Arabic)!");
    form.tagnamearb.focus();
    return false;
  }
}

// Form Validation Add Offer Tag


// Form Validation Edit Offer Tag

  function validateEditOfferTag(form)
  {
    if(form.tagname.value=="") {
      alert("Error: Please Enter The Offer Tag Name(English)!");
      form.tagname.focus();
      return false;
    }
    if(form.tagnamearb.value=="") {
      alert("Error: Please Enter The Offer Tag Name(Arabic)!");
      form.tagnamearb.focus();
      return false;
    }
  }

// Form Validation Edit Offer Tag


// Form Validation Add Event

  function validateEvent(form)
  {
    if(form.eventname.value=="") {
      alert("Error: Please Enter The Event Name(English)!");
      form.eventname.focus();
      return false;
    }
    if(form.eventnamearb.value=="") {
      alert("Error: Please Enter The Event Name(Arabic)!");
      form.eventnamearb.focus();
      return false;
    }
    if(form.start.value=="") {
      alert("Error: Please Select The Start Date");
      form.start.focus();
      return false;
    }
    if(form.end.value=="") {
      alert("Error: Please Select The End Date");
      form.end.focus();
      return false;
    }
    if(form.amount.value=="") {
      alert("Error: Please Enter The Amount");
      form.amount.focus();
      return false;
    }
    if(form.phone.value=="") {
      alert("Error: Please Enter The Phone Number");
      form.phone.focus();
      return false;
    }
    if(form.email.value=="") {
      alert("Error: Please Enter The Email Id");
      form.email.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Description!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditor1").getContent();
    if (content == '') {
    alert("Please Enter The Page Description Arabic!");
    tinyMCE.get('texteditor1').focus();
    return false;
    }
    if(form.summeryen.value=="") {
      alert("Error: Please Enter The Summery(English)");
      form.summeryen.focus();
      return false;
    }
    if(form.summeryarb.value=="") {
      alert("Error: Please Enter The Summery(Arabic)");
      form.summeryarb.focus();
      return false;
    }
    if(form.location.value=="") {
      alert("Error: Please Enter The Location");
      form.location.focus();
      return false;
    }
    if(form.locationarb.value=="") {
      alert("Error: Please Enter The Location Arabic");
      form.locationarb.focus();
      return false;
    }
    
    if(form.latitude.value=="") {
      alert("Error: Please Select Location");
      form.latitude.focus();
      return false;
    }
    if(form.longitude.value=="") {
      alert("Error: Please Select Location");
      form.longitude.focus();
      return false;
    }
    if(form.image.value=="") {
      alert("Error: Please Select The Image!");
      form.image.focus();
      return false;
    }
  }

// Form Validation Add Event

  // Form Validation Add Event

  function validateEditEvent(form)
  {
    if(form.eventname.value=="") {
      alert("Error: Please Enter The Event Name(English)!");
      form.eventname.focus();
      return false;
    }
    if(form.eventnamearb.value=="") {
      alert("Error: Please Enter The Event Name(Arabic)!");
      form.eventnamearb.focus();
      return false;
    }
    if(form.start.value=="") {
      alert("Error: Please Select The Start Date");
      form.start.focus();
      return false;
    }
    if(form.end.value=="") {
      alert("Error: Please Select The End Date");
      form.end.focus();
      return false;
    }
    if(form.amount.value=="") {
      alert("Error: Please Enter The Amount");
      form.amount.focus();
      return false;
    }
    if(form.phone.value=="") {
      alert("Error: Please Enter The Phone Number");
      form.phone.focus();
      return false;
    }
    if(form.email.value=="") {
      alert("Error: Please Enter The Email Id");
      form.email.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Description!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditor1").getContent();
    if (content == '') {
    alert("Please Enter The Page Description Arabic!");
    tinyMCE.get('texteditor1').focus();
    return false;
    }
    if(form.summeryen.value=="") {
      alert("Error: Please Enter The Summery(English)");
      form.summeryen.focus();
      return false;
    }
    if(form.summeryarb.value=="") {
      alert("Error: Please Enter The Summery(Arabic)");
      form.summeryarb.focus();
      return false;
    }
    if(form.location.value=="") {
      alert("Error: Please Enter The Location");
      form.location.focus();
      return false;
    }
    if(form.locationarb.value=="") {
      alert("Error: Please Enter The Location Arabic");
      form.locationarb.focus();
      return false;
    }
    
    if(form.latitude.value=="") {
      alert("Error: Please Select Location");
      form.latitude.focus();
      return false;
    }
    if(form.longitude.value=="") {
      alert("Error: Please Select Location");
      form.longitude.focus();
      return false;
    }
  }

// Form Validation Add Event

// Page Validation

  function validateEditPage(form)
  {
    if(form.heading.value=="") {
      alert("Error: Please Enter The Page Heading!");
      form.heading.focus();
      return false;
    }
    if(form.headingArb.value=="") {
      alert("Error: Please Enter The Page Heading(Arabic)!");
      form.headingArb.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Page Content!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditorOne").getContent();
    if (content == '') {
    alert("Please Enter The Page Content(Arabic)!");
    tinyMCE.get('texteditorOne').focus();
    return false;
    }
  }

// Page Validation


// Qatar Page Adding Validate

function validateQatar(form)
{
  if(form.heading.value=="") {
    alert("Error: Please Enter The Heading English!");
    form.heading.focus();
    return false;
  }
  if(form.headingArb.value=="") {
    alert("Error: Please Enter The Heading Arabic!");
    form.headingArb.focus();
    return false;
  }
  var content = tinymce.get("texteditor").getContent();
  if (content == '') {
  alert("Please Enter The Content English!");
  tinyMCE.get('texteditor').focus();
  return false;
  }
  var contentArb = tinymce.get("texteditorOne").getContent();
  if (contentArb == '') {
  alert("Please Enter The Content Arabic!");
  tinyMCE.get('texteditorOne').focus();
  return false;
  }
  if(form.limitcontent.value=="") {
    alert("Error: Please Enter The Content English!");
    form.limitcontent.focus();
    return false;
  }
  if(form.limitcontentArb.value=="") {
    alert("Error: Please Enter The Content Arabic!");
    form.limitcontentArb.focus();
    return false;
  }
  if(form.image.value=="") {
    alert("Error: Please Upload The Image!");
    form.image.focus();
    return false;
  }

}

// Qatar Page Adding Validate

// Qatar Page Edit Validate

  function validateEditQatar(form)
  {
    if(form.heading.value=="") {
      alert("Error: Please Enter The Heading!");
      form.heading.focus();
      return false;
    }
    if(form.headingArb.value=="") {
      alert("Error: Please Enter The Heading(Arabic)!");
      form.headingArb.focus();
      return false;
    }
    var content = tinymce.get("texteditor").getContent();
    if (content == '') {
    alert("Please Enter The Content!");
    tinyMCE.get('texteditor').focus();
    return false;
    }
    var content = tinymce.get("texteditorone").getContent();
    if (content == '') {
    alert("Please Enter The Content(Arabic)!");
    tinyMCE.get('texteditorone').focus();
    return false;
    }
    if(form.limitcontent.value=="") {
      alert("Error: Please Enter The Summery!");
      form.limitcontent.focus();
      return false;
    }
    if(form.limitcontentArb.value=="") {
      alert("Error: Please Enter The Summery(Arabic)!");
      form.limitcontentArb.focus();
      return false;
    }
  }

// Qatar Page Edit Validate


// News Category Adding Validate

function validateNewsCategory(form)
{
  if(form.categoryname.value=="") {
    alert("Error: Please Enter The Category Name (English)!");
    form.categoryname.focus();
    return false;
  }
  if(form.categorynamearb.value=="") {
    alert("Error: Please Enter The Category Name (Arabic)!");
    form.categorynamearb.focus();
    return false;
  }

}

// News Category Adding Validate

// News Author Adding Validate

function validateAuthor(form)
{
  if(form.Authorname.value=="") {
    alert("Error: Please Enter The Author Name!");
    form.Authorname.focus();
    return false;
  }
}

// News Author Adding Validate



// Form Validation
















// Business Adding

function validateBusiness(form)
{

if(form.companyname.value=="") {
  alert("Error: Please Enter The Company Name!");
  form.companyname.focus();
  return false;
}
if(form.companynamearb.value=="") {
  alert("Error: Please Enter The Company Name(Arabic)!");
  form.companynamearb.focus();
  return false;
}
var content = tinymce.get("texteditor").getContent();
if (content == '') {
alert("Please Enter The Content!");
tinyMCE.get('texteditor').focus();
return false;
}
var content = tinymce.get("texteditorOne").getContent();
if (content == '') {
alert("Please Enter The Content(Arabic)!");
tinyMCE.get('texteditorOne').focus();
return false;
}
if(form.companytag.value=="") {
  alert("Error: Please Enter The Company Tagline!");
  form.companytag.focus();
  return false;
}
if(form.companytagarb.value=="") {
  alert("Error: Please Enter The Company Tagline(Arabic)!");
  form.companytagarb.focus();
  return false;
}
if(form.companylocation.value=="") {
  alert("Error: Please Enter The Company Location!");
  form.companylocation.focus();
  return false;
}
if(form.companylocationarb.value=="") {
  alert("Error: Please Enter The Company Location(Arabic)!");
  form.companylocationarb.focus();
  return false;
}
if(form.latitude.value=="") {
  alert("Error: Please Enter The Company Latitude!");
  form.latitude.focus();
  return false;
}
if(form.longitude.value=="") {
  alert("Error: Please Enter The Company Longitude!");
  form.longitude.focus();
  return false;
}
// if(!form.companycategory.checked) {
//   alert("Error: Please Select The Category!");
//   form.companycategory.focus();
//   return false;
// }

if(form.companyphonenumber.value=="") {
  alert("Error: Please Enter The Company Phone Number!");
  form.companyphonenumber.focus();
  return false;
}
if(form.companyemail.value=="") {
  alert("Error: Please Enter The Company Email Id!");
  form.companyemail.focus();
  return false;
}
if(form.image.value=="") {
  alert("Error: Please Upload The Profile Image!");
  form.image.focus();
  return false;
}
if(form.backimage.value=="") {
  alert("Error: Please Upload The Background Image!");
  form.backimage.focus();
  return false;
}

// Working Hours




// Working Hours

}

function profilereadURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#prfl')
          .attr('src', e.target.result)
          .width(280)
          .height(180);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
function backgroundreadURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#bckgrd')
        .attr('src', e.target.result)
        .width(280)
        .height(180);
    };
    reader.readAsDataURL(input.files[0]);
}
}

// Business Adding

function validateEditBusiness(form)
{

if(form.companyname.value=="") {
  alert("Error: Please Enter The Company Name!");
  form.companyname.focus();
  return false;
}
if(form.companynamearb.value=="") {
  alert("Error: Please Enter The Company Name(Arabic)!");
  form.companynamearb.focus();
  return false;
}
var content = tinymce.get("texteditor").getContent();
if (content == '') {
alert("Please Enter The Content!");
tinyMCE.get('texteditor').focus();
return false;
}
var content = tinymce.get("texteditorOne").getContent();
if (content == '') {
alert("Please Enter The Content(Arabic)!");
tinyMCE.get('texteditorOne').focus();
return false;
}
if(form.companytag.value=="") {
  alert("Error: Please Enter The Company Tagline!");
  form.companytag.focus();
  return false;
}
if(form.companytagarb.value=="") {
  alert("Error: Please Enter The Company Tagline(Arabic)!");
  form.companytagarb.focus();
  return false;
}
if(form.companylocation.value=="") {
  alert("Error: Please Enter The Company Location!");
  form.companylocation.focus();
  return false;
}
if(form.companylocationarb.value=="") {
  alert("Error: Please Enter The Company Location(Arabic)!");
  form.companylocationarb.focus();
  return false;
}
if(form.Latitude.value=="") {
  alert("Error: Please Enter The Company Latitude!");
  form.Latitude.focus();
  return false;
}
if(form.Longitude.value=="") {
  alert("Error: Please Enter The Company Longitude!");
  form.Longitude.focus();
  return false;
}
// if(!form.companycategory.checked) {
//   alert("Error: Please Select The Category!");
//   form.companycategory.focus();
//   return false;
// }

if(form.companyphonenumber.value=="") {
  alert("Error: Please Enter The Company Phone Number!");
  form.companyphonenumber.focus();
  return false;
}
if(form.companyemail.value=="") {
  alert("Error: Please Enter The Company Email Id!");
  form.companyemail.focus();
  return false;
}
}






validateEditNews
function validateNews(form)
{
if(form.headingen.value=="") {
  alert("Error: Please Enter Heading!");
  form.headingen.focus();
  return false;
}
if(form.headingarb.value=="") {
  alert("Error: Please Enter Heading (Arabic)!");
  form.headingarb.focus();
  return false;
}
var content = tinymce.get("texteditor").getContent();
if (content == '') {
alert("Please Enter The  Content!");
tinyMCE.get('texteditor').focus();
return false;
}
var content = tinymce.get("texteditorone").getContent();
if (content == '') {
alert("Please Enter The Page Content(Arabic)!");
tinyMCE.get('texteditorone').focus();
return false;
}
if(form.summeryen.value=="") {
  alert("Error: Please Enter Summery Content!");
  form.summeryen.focus();
  return false;
}
if(form.summeryarb.value=="") {
  alert("Error: Please Enter Summery Content(Arabic)!");
  form.summeryarb.focus();
  return false;
}
if(form.image.value=="") {
  alert("Error: Please Selcte Image!");
  form.image.focus();
  return false;
}
}
function validateEditNews(form)
{
if(form.headingen.value=="") {
  alert("Error: Please Enter Heading!");
  form.headingen.focus();
  return false;
}
if(form.headingarb.value=="") {
  alert("Error: Please Enter Heading (Arabic)!");
  form.headingarb.focus();
  return false;
}
var content = tinymce.get("texteditor").getContent();
if (content == '') {
alert("Please Enter The  Content!");
tinyMCE.get('texteditor').focus();
return false;
}
var content = tinymce.get("texteditorone").getContent();
if (content == '') {
alert("Please Enter The Page Content(Arabic)!");
tinyMCE.get('texteditorone').focus();
return false;
}
if(form.summeryen.value=="") {
  alert("Error: Please Enter Summery Content!");
  form.summeryen.focus();
  return false;
}
if(form.summeryarb.value=="") {
  alert("Error: Please Enter Summery Content(Arabic)!");
  form.summeryarb.focus();
  return false;
}
}

