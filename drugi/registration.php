<?php  include "db.php"; ?>
 <?php  include "header.php"; ?>
 <?php include "functions.php"; ?>
 
<?php 


  if(isset($_POST['submit']))  {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
	
	if(isset($_POST['spol'])){
	$spol     = $_POST['spol'];
	} else {
		$spol = "nevažno";
	}
	if(isset($_POST['hrvatski'])){
	$hrvatski = $_POST['hrvatski'];
	} else {
		$hrvatski = " ne govori ";
	}
	if(isset($_POST['engleski'])){
	$engleski = $_POST['engleski'];
	} else {
		$engleski = "ne govori";
	}
	if(isset($_POST['njemacki'])){
	$njemacki = $_POST['njemacki'];
	} else {
		$njemacki = "ne govori";
	}
	if(isset($_POST['talijanski'])){
	$talijanski = $_POST['talijanski'];
	} else {
		$talijanski = "ne govori";
	}
	if(isset($_POST['francuski'])){
	$francuski = $_POST['francuski'];
	} else {
		$francuski = "ne govori";
	}
	
	 $textarea = $_POST['textarea'];

	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	
    $error = [

        'username'=> '',
        'email'=>'',
		'textarea' =>'',
     
		

    ];


    if(strlen($username) < 4){

        $error['username'] = 'Username needs to be longer';


    }

     if($username ==''){

        $error['username'] = 'Morate upisati ime';


    }


     if(username_exists($username)){

        $error['username'] = 'Ime već postoji, izaberite drugo';


    }



    if($email ==''){

        $error['email'] = 'Morate upisati email';


    }


     if(email_exists($email)){

        $error['email'] = 'Email već postoji, upišite drugi';


    }

	if($textarea ==''){

        $error['textarea'] = 'Morate upisati poruku';
   
	}

    foreach ($error as $key => $value) {
        
        if(empty($value)){

            unset($error[$key]);

        }



    } // foreach

    if(empty($error)){

        register_user($username, $email, $spol, $hrvatski, $engleski, $njemacki, $talijanski, $francuski, $textarea );

       redirect("/php/drugi/registration.php");


    }

    

} 


?>
 

    <!-- Navigation -->
    
    
    
 
    <!-- Page Content -->
   
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-5">
                <div class="form-wrap">
                <h1>Kontakt</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="upiši ime"

                            autocomplete="on"

                            value="<?php  echo isset($username) ? $username : '' ?>">

                            <p><font color="red"><?php echo isset($error['username']) ? $error['username'] : '' ?></font></p>

                       
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="korisnik@e" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

                             <p><font color="red"><?php echo isset($error['email']) ? $error['email'] : '' ?></font></p>
              
                        </div>
						
						Spol:<br/>
							<input type="radio" name="spol" value="M" <?php if(isset($_POST['spol']) == 'M')  echo ' checked="checked"';?> />muski</br>
							<input type="radio" name="spol" value="Z" <?php if(isset($_POST['spol']) == 'Z')  echo ' checked="checked"';?> />ženski</br>
							</br>
						
						Jezik:<br/>
                            <input type="checkbox" name="hrvatski"  value="hrvatski" <?php if(isset($_POST['hrvatski'])) echo "checked='checked'"; ?>>hrvatski<br/>
							<input type="checkbox" name="engleski"   value="engleski" <?php if(isset($_POST['engleski'])) echo "checked='checked'"; ?>>engleski<br/> 
							<input type="checkbox" name="njemacki"   value="njemacki" <?php if(isset($_POST['njemacki'])) echo "checked='checked'"; ?>>njemacki<br/> 
							<input type="checkbox" name="talijanski" value="talijanski" <?php if(isset($_POST['talijanski'])) echo "checked='checked'"; ?>>talijanski<br/> 
							<input type="checkbox" name="francuski"  value="francuski" <?php if(isset($_POST['francuski'])) echo "checked='checked'"; ?>>francuski<br/> 
                           
						   Textarea:<br/>
							<textarea  class="form-control" name="textarea" id="textarea" rows="5" cols="70" placeholder="upiši poruku" value="<?php echo isset($textarea) ? $textarea : '' ?>"  ><?php if(isset($_POST['textarea'])) { echo htmlentities ($_POST['textarea']);  } ?></textarea>
							
							<p><font color="red"><?php echo isset($error['textarea']) ? $error['textarea'] : '' ?></font></p>
							<br/>                       
					<input type="submit" name="submit" id="" class="btn btn-custom btn-lg btn-block" value="submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


     <?php include "view.php" ?>   




