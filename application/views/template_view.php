<?php header('Content-type: text/html; charset=utf-8'); ?>
<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

  <link rel="stylesheet" href="http://localhost/css/style.css">
  <link rel="stylesheet" href="http://localhost/css/prism.css">
  <link rel="stylesheet" href="http://localhost/css/chosen.css">
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
    <form action="/save/sent" method="post">
        
      <label for="FIO">FIO</label>
      <input id="FIO" type="text" name="name" value="<?php echo $data['name']; ?>" required>
      <?php if (isset($errors['name'])) { print_r($errors['name']);
      } ?>
        
      <label for="email">email</label>
      <input id="email" type="email" name="email" value="<?php echo $data['email']; ?>"required>
      <?php if (isset($errors['email'])) { print_r($errors['email']);
      } ?>
    
        <select name="district" id="district" class="chosen-select district" onchange="selectDistrict(this)">
          <option value="">Выберите область:</option>
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
      <?php if (isset($errors['district'])) { print_r($errors['district']);
      } ?>

        
        <select name="town" id="town"   onchange="">
          <option value="">Выбирете населеный пункт:</option>
          </select>    
      <?php if (isset($errors['town'])) { print_r($errors['town']);
      } ?>

        <select name="area" id="area"  onchange="changeTown(this)">
          <option value="">Выберите район:</option>
          </select>    
      <?php if (isset($errors['area'])) { print_r($errors['area']);
      } ?>

      <input type="submit" value="Save">
    </form>
    
    <script src="http://localhost/js/jquery-3.2.1.min.js" type="text/javascript"></script>
      <script src="http://localhost/js/workSelect.js" type="text/javascript" charset="utf-8"></script>
      <script src="http://localhost/js/chosen.jquery.js" type="text/javascript"></script>
      <script src="http://localhost/js/prism.js" type="text/javascript" charset="utf-8"></script>
      <script src="http://localhost/js/init.js" type="text/javascript" charset="utf-8"></script>

    </body>
