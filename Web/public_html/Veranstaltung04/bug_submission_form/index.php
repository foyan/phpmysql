<!DOCTYPE html>
<html>
<head>
	<title>Submit us your Bug!</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<script type="text/javascript">
		  // ref: http://diveintohtml5.org/detect.html
	  function supports_input_placeholder()
	  {
	    var i = document.createElement('input');
	    return 'placeholder' in i;
	  }

	  if(!supports_input_placeholder()) {
	    var fields = document.getElementsByTagName('INPUT');
	    for(var i=0; i < fields.length; i++) {
	      if(fields[i].hasAttribute('placeholder')) {
	        fields[i].defaultValue = fields[i].getAttribute('placeholder');
	        fields[i].onfocus = function() { if(this.value == this.defaultValue) this.value = ''; }
	        fields[i].onblur = function() { if(this.value == '') this.value = this.defaultValue; }
	      }
	    }
	  }
</script>
</head>
<body>

	<h2>Bitte melde deinen Bug mit diesem Formular</h2>
	
	<form class="form" action="filebug.php" method="POST" enctype="multipart/form-data">
		
        <?php
            require_once ("recaptchalib.php");
            $publickey = "6LfZH-gSAAAAANljNYU3IW0fBWt1kgPnwY1GNF_B";
            echo recaptcha_get_html($publickey);
        ?>



            <p class="name">
			<input type="text" name="name" id="name" placeholder="John Doe" required="required" value="Florian" />
			<label for="name">Name</label>
		</p>
		
		<p class="email">
			<input type="text" name="email" id="email" placeholder="mail@example.com" required="required" value="luethifl@students.zhaw.ch" />
			<label for="email">Email</label>
		</p>
		
		<p class="web">
			<input type="text" name="web" id="web" placeholder="www.example.com" required="required" value="www.github.com" />
			<label for="web">Betreffende Website</label>
		</p>		
	
		<p class="web">
			<input type="file" name="file" id="attachment" required="required" />
			<label for="file">Screenshot/Sonstiges File</label>
		</p>		

		<p class="web">
			<input type="range" name="prio" id="prio" style="margin-left:0;" />
			<label for="prio">Prio</label>
		</p>		

		<p class="web">
                    <select id="bugtype" name="bugtype">
                        <option value="foul">Foul</option>
                        <option value="foul">Grobes Foul</option>
                        <option value="foul">Gelb</option>
                        <option value="foul">Rot</option>
                    </select>
			<label for="bugtype">Type</label>
		</p>		

 		<p class="web">
			<input type="checkbox" name="callback" id="callback" />
			<label for="prio">Rückrüf?</label>
		</p>		

 		<p class="web">
			<input type="radio" name="repro[]" value="reproduzierbar" id="repro1" checked="checked"/>
			<label>Reproduzierbar</label>
                        <br/>
			<input type="radio" name="repro[]" value="nichtReproduzierbar" id="repro2" />
			<label>Nicht reproduzierbar</label>
		</p>		

 		<p class="web">
			<input type="date" name="datum" id="datum" required="required" value="2013-07-30" />
			<label for="prio">Datum</label>
		</p>		

 		<p class="web">
			<input type="password" name="passwort" id="passwort" required="required" />
			<label for="prio">Passwort</label>
		</p>		

                <p class="text">
			<textarea name="text" placeholder="Fehlerreport" value="github ist kaputt." /></textarea>
		</p>
		
		<p class="submit">
			<input type="submit" value="Senden" />
		</p>

 <?php
                if(isset($_GET['status'])){
                    $status = htmlspecialchars($_GET['status']);
                    
                    if($status=="ok") {
                        echo '
                            <div class="resultat good">
                            Danke, hat geklappt.
                            </div>
                            ';
                    } else if($status == "captcha"){
                        echo '
                            <div class="resultat bad">
                            Valsches Captcha.
                            </div>
                            ';
                    } else if($status == "noauth"){
                        echo '
                            <div class="resultat bad">
                            Falsches Passwort. Das richtige Passwort ist "jaime".
                            </div>
                            ';
                    } else if($status == "error"){
                        echo '
                            <div class="resultat bad">
                            Hat nicht geklappt. Validierung fehlgeschlagen, oder sonst etwas kaputt.
                            </div>
                            ';
                    }
                }
                ?>
        
        
        </form>

</body>
</html>