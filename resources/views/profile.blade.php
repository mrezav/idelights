<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    
    
    <div class="container">
        <img class="loading" src="{{ asset('assets/loading.gif') }}" width="60%">
        <div class="head">
            <img src="">
            <p class="name"></p>
        </div>
        
        <div class="content">
            <table class="info" cellspacing="12">                
                <tr>
                    <th>Gender</th>
                    <td class="gender"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td class="email"></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td class="cell"></td>
                </tr>
                <tr>
                    <th>Date Of Birth</th>
                    <td class="dob"></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td class="age"></td>
                </tr>
                <tr>
                    <th>Post Code</th>
                    <td class="post"></td>
                </tr>
                <tr>
                    <th rowspan="3">Address</th>
                    <td class="street"></td>
                </tr>
                <tr>
                    <td class="city"></td>
                </tr>
            </table>
            
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$('document').ready(function(){
   $.ajax({
       url : "https://randomuser.me/api/",
       type : 'GET',
       beforeSend:function(){
           $('.head').css('display','none');
           $('.content').css('display','none');
           $('.loading').css('display', 'flex');
       },
       success:function(data){
            $('.head').css('display','flex');
            $('.content').css('display','flex');
            $('.loading').css('display', 'none');

            const profile = data.results[0];
            // console.log(profile);
            let name = profile.name.first + ' ' + profile.name.last;
            let birth = profile.dob.date.substring(0,10);
            $('img').attr('src', profile.picture.large);
            $('.name').html(name)
            $('.gender').html(profile.gender);
            $('.email').html(profile.email);
            $('.cell').html(profile.cell);
            $('.dob').html(birth);
            $('.age').html(profile.dob.age);
            $('.post').html(profile.location.postcode);
            $('.street').html(profile.location.street.name + ', ' + profile.location.street.number);
            $('.city').html(profile.location.city+ ', '+profile.location.country);
       }
   })
})

</script>
</body>
</html>