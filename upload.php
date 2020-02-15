<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="w4vr6thzkzb9qtw"></script>

<script> // javascript
var button = Dropbox.createChooseButton(options);
document.getElementById("container").appendChild(button);
options = {

// Required. Called when a user selects an item in the Chooser.
success: function(files) {
    alert("Here's the file link: " + files[0].link)
},

// Optional. Called when the user closes the dialog without selecting a file
// and does not include any parameters.
cancel: function() {

},

// Optional. "preview" (default) is a preview link to the document for sharing,
// "direct" is an expiring link to download the contents of the file. For more
// information about link types, see Link types below.
linkType: "preview", // or "direct"

// Optional. A value of false (default) limits selection to a single file, while
// true enables multiple file selection.
multiselect: false, // or true

// Optional. This is a list of file extensions. If specified, the user will
// only be able to select files with these extensions. You may also specify
// file types, such as "video" or "images" in the list. For more information,
// see File types below. By default, all extensions are allowed.
extensions: ['.pdf', '.doc', '.docx'],

// Optional. A value of false (default) limits selection to files,
// while true allows the user to select both folders and files.
// You cannot specify `linkType: "direct"` when using `folderselect: true`.
folderselect: false, // or true

// Optional. A limit on the size of each file that may be selected, in bytes.
// If specified, the user will only be able to select files with size
// less than or equal to this limit.
// For the purposes of this option, folders have size zero.
sizeLimit: 1024, // or any positive number
};

file = {
    // Unique ID for the file, compatible with Dropbox API v2.
    id: "id:...",

    // Name of the file.
    name: "filename.txt",

    // URL to access the file, which varies depending on the linkType specified when the
    // Chooser was triggered.
    link: "https://...",

    // Size of the file in bytes.
    bytes: 464,

    // URL to a 64x64px icon for the file based on the file's extension.
    icon: "https://...",

    // A thumbnail URL generated when the user selects images and videos.
    // If the user didn't select an image or video, no thumbnail will be included.
    thumbnailLink: "https://...?bounding_box=75&mode=fit",

    // Boolean, whether or not the file is actually a directory
    isDir: false,
};
</script>

</body>
</html>