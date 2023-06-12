<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .container {
  width: 400px;
  margin: 0 auto;
}

.form_body {
  padding: 20px;
  background-color: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="email"],
input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input.submit {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input.submit:hover {
  background-color: #45a049;
}

/* Optional: Increase the textarea height */
textarea {
  resize: vertical;
}

/* Optional: Add some spacing between the form elements */
form > * {
  margin-bottom: 10px;
}
</style>

</head>

<body>
<div class="container">
<div class="form_body">
<form action="{{route('send_mail')}}" method="post" enctype="multipart/form-data">
@csrf
<label for="">Email To</label><br>
<input type="email" name="email"
placeholder="Example@email.com"><br><br>
<label for="">cc</label><br>
<input type="email" name="cc"
placeholder="Example@email.com"><br><br>
<label for="">bcc</label><br>
<input type="email" name="bcc"
placeholder="Example@email.com"><br><br>
<label for="">Subject</label><br>
<input type="text" name="subject" placeholder="Subject"><br><br>
<label for="">Body</label><br>
<textarea name="details" id="" cols="30"
rows="5"></textarea><br>
<h4>Uploading File</h4>
<label for="">Please Upload file here</label><br><br>
<input type="file" name="file" ><br><br>
<input class="submit" type="submit" name="SubmitButton" id="">
</form> 
</div>
</div>
</body>
</html>
