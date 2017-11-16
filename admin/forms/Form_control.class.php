<?php 
	
	class Form_control{
		function __construct(){}

		public function load_img(){
        document.getElementById("area1").innerHTML = '<object class="adm-content-area" type="text/html" data="forms/salvarImagem.php" ></object>';
        }
        function delete_img(){
        document.getElementById("area1").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarImagem.php" ></object>';
        }
        function load_slogan(){
        document.getElementById("area2").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarSlogan.php" ></object>';
        }
        function load_box1(){
        document.getElementById("area3").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarBox1.php" ></object>';
        }
        function load_box2(){
        document.getElementById("area4").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarBox2.php" ></object>';
        }
        function load_box3(){
        document.getElementById("area5").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarBox3.php" ></object>';
        }
        function load_box4(){
        document.getElementById("area6").innerHTML='<object class="adm-content-area" type="text/html" data="forms/salvarBox4.php" ></object>';
        }
	}





?>