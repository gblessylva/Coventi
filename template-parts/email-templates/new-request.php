<!DOCTYPE html PUBLIC "...">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <title><?php echo esc_html( $customer_subject ); ?></title>
  <style>
  .email-content{
    display: flex;
    align-items: center;
    flex-direction: column;
    width: 100%;
    font-family: 'Roboto', sans-serif;

  }
  .cta{
    text-decoration: none;
    color: white;
    font-weight: 600;
    font-size: 20px;
    display: inline-block;
    padding: 16px 30px;
    transition: 0.5s;
    margin-top: 10px;
    background: #6083FF;
    border-radius: 6px;
    font-family: 'Roboto', sans-serif;

  }
  a{
    color: #6083FF;
  }
</style>
</head>
<body>
<div class="email-content" style="
    width: 100%;
    font-family: 'Roboto', sans-serif;
">
  <p class="email-header">
      <p class="email-logo" style="display:flex; margin-bottom:20px; margin-top:30px; text-align: center; "><img style="display: block; margin: auto"  src="https://coventi.co/wp-content/uploads/2022/10/image-1-1.png" alt="" srcset=""></p>
</p>
  <br>
  <div class="content">
    <p>Hello <?php echo $full_name ?> ,</p>
    <p><?php echo $customer_message;?></p>
    <a href="https://coventi.co/" class="cta" style="
         text-decoration: none;
        color: white;
        font-weight: 600;
        font-size: 20px;
        display: inline-block;
        padding: 16px 30px;
        transition: 0.5s;
        margin-top: 10px;
        background: #6083FF;
        border-radius: 6px;
        font-family: 'Roboto', sans-serif;
    ">Learn More about Co'venti</a>
    <div class="footer">
      <p>Best Regards</p>
      <p>Co'venti Team</p>
      <a style="
        color: #6083FF;
        text-decoration:none;
      " href="mailto:info@coventi.co">info@coventi.co</a>
    </div>
  </div>
</div>


</body>
</html>