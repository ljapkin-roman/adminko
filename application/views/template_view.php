<?php header('Content-type: text/html; charset=utf-8'); ?>
<head>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/prism.css">
  <link rel="stylesheet" href="css/chosen.css">
</head>
<body>
	<h1> Register form </h1>
	
	<h1> Register form </h1>
	<p> Как заполнять форму </p>
	<p> Имя и емаил можно заполнить стандартным способом</p>
	<p> 1) Выберите область из списка </p>
	<p> 2) Если живете в городе можете выбрать сразу город из формы "Выберите населеный пункт" </p>
	<p> 3) Если живете в районе , выбираете свой район  </p>
	<p> 4) Выберите населеный пункт, там будут показаны населенные пункты только этого района  </p>
	<p> Форма может немного подтормаживать , как работает с удаленной базой  </p>
	<form action="/save.php" method="post">
		
	  <label for="FIO">FIO</label>
	  <input id="FIO" type="text" name="name" required>
		
	  <label for="email">email</label>
	  <input id="email" type="email" name="email" required>
	
		<select name="district" id="district" class="chosen-select" onchange="selectDistrict(this)">
		  <option value="">Select a person:</option>
		  <option value="Вінницька">Вінницька</option>
		  <option value="Волинська">Волинська</option>
		  <option value="Дніпропетровська">Дніпропетровська</option>
		  <option value="Донецька">Донецька</option>
		  <option value="Житомирська">Житомирська</option>
		  <option value="Закарпатська">Закарпатська</option>
		  <option value="Запорізька">Запорізька</option>
		  <option value="Івано-Франківська">Івано-Франківська</option>
		  <option value="Київська">Київська</option>
		  <option value="Кіровоградська">Кіровоградська</option>
		  <option value="Луганська">Луганська</option>
		  <option value="Львівська">Львівська</option>
		  <option value="Миколаївська">Миколаївська</option>
		  <option value="Одеська">Одеська</option>
		  <option value="Полтавська">Полтавська</option>
		  <option value="Рівненська">Рівненська</option>
		  <option value="Сумська">Сумська</option>
		  <option value="Тернопільська">Тернопільська</option>
		  <option value="Харківська">Харківська</option>
		  <option value="Херсонська">Херсонська</option>
		  <option value="Хмельницька">Хмельницька</option>
		  <option value="Черкаська">Черкаська</option>
		  <option value="23">Чернівецька</option>
		  <option value="Чернігівська">Чернігівська</option>
		  <option value="Автономна Республіка Крим">Автономна Республіка Крим</option>
  		</select>	

		
		<select name="town" id="town" onchange="">
		  <option value="">Выбирете населеный пункт:</option>
  		</select>	

		<select name="area" id="area" onchange="changeTown(this)">
		  <option value="">Выберите район:</option>
  		</select>	

	  <input type="submit" value="Save">
	</form>
	
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
  	<script src="js/chosen.jquery.js" type="text/javascript"></script>
  	<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
  	<script src="js/init.js" type="text/javascript" charset="utf-8"></script>
  	<script src="js/workSelect.js" type="text/javascript" charset="utf-8"></script>

	</body>
