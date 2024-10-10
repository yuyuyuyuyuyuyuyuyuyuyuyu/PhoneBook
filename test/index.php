<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="../css/live_search.css" >
</head>
<body>

<!-- выбор с возможностью поиска -->
  <select id="select-state" placeholder="Pick a state...">
    <option value="">Select a state...</option>
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
  </select>

  <script>
    $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
  </script>
  <!-- выбор с возможностью поиска конец скрипта -->

<br>
<br>Поиск по списку LI:
<br>
  <!-- поиск по списку LI -->
<input type='text' id='elastic'>

<div>
  <ul class='elastic'>
    <li>Albania</li>
    <li>China</li>
    <li>Russia</li>
    <li>USA</li>
    <li>Bolivia</li>
    <li>Bosnia</li>
    <li>Turckish</li>
    <li>Chili</li>
    <li>Peru</li>
    <li>Meksika</li>
    <li>Angola</li>
    <li>Canada</li>
</ul>
</div>

<br>
<br>
<br>Поиск по классу DIV
<br>
<div class='elastic'>
  <p> Albaniya</p>
</div>



<script>

    document.querySelector('#elastic').oninput = function(){
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.elastic li');
    if (val != ''){
        elasticItems.forEach(function (elem) {
                if (elem.innerText.search(val)==-1){
                    elem.classList.add('hide');
                    elem.innerHTML = elem.innerText;
                }
                else{
                    elem.classList.remove('hide');
                    let str = elem.innerText;
                    elem.innerHTML = insertMark (str,elem.innerText.search(val), val.length);
                }
        }  ); 
    }
    else{
        elasticItems.forEach(function (elem){
            elem.classList.remove('hide');
            elem.innerHTML = elem.innerText;

        });
    }
}

function insertMark(string, pos, len){
    return string.slice(0,pos) + '<mark>'+ string.slice(pos, pos+len)+
                 '</mark>' +string.slice(pos+len);
}

  </script>
  <!-- конец поиска по списку LI-->


  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- Поиск по таблице -->
  <div class="sm:col-span-1 md:col-span-2 lg:col-span-2 xl:col-span-2 shadow-md dark:bg-gray-100 bg-white p-4 rounded-lg" id="content">
      <h2>DEMO</h2>
<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search-text" onkeyup="tableSearch()" placeholder="Фамилия или телефон" type="text"><br><br>

<table class="table-auto" id="info-table">
  <thead>
    <tr>
      <th class="px-4 py-2">Фамилия</th>
      <th class="px-4 py-2">Телефон</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="border px-4 py-2">Иванов</td>
      <td class="border px-4 py-2">511246</td>
    </tr>
    <tr class="bg-gray-100">
      <td class="border px-4 py-2">Петров</td>
      <td class="border px-4 py-2">411751</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Сидоров</td>
      <td class="border px-4 py-2">611951</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Медведев</td>
      <td class="border px-4 py-2">112781</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Николаев</td>
      <td class="border px-4 py-2">332781</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Алексеев</td>
      <td class="border px-4 py-2">671951</td>
    </tr>
  </tbody>
</table>

<br>
<table class="table-auto" id="info-table1">
  <thead>
    <tr>
      <th class="px-4 py-2">Фамилия</th>
      <th class="px-4 py-2">Телефон</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="border px-4 py-2">Иванов</td>
      <td class="border px-4 py-2">511246</td>
    </tr>
    <tr class="bg-gray-100">
      <td class="border px-4 py-2">Петров</td>
      <td class="border px-4 py-2">411751</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Сидоров</td>
      <td class="border px-4 py-2">611951</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Медведев</td>
      <td class="border px-4 py-2">112781</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Николаев</td>
      <td class="border px-4 py-2">332781</td>
    </tr>
    <tr>
      <td class="border px-4 py-2">Алексеев</td>
      <td class="border px-4 py-2">671951</td>
    </tr>
  </tbody>
</table>
</div>

<script>
function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    var table1 = document.getElementById('info-table1');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
                  for (var j = table1.rows[i].cells.length - 1; j >= 0; j--) {
                      flag = regPhrase.test(table1.rows[i].cells[j].innerHTML);
                      if (flag) break;
                  }
        if (flag) {
            table.rows[i].style.display = "";
            table1.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
            table1.rows[i].style.display = "none";
        }

    }
}
</script>

  <!-- Конец поиска по таблице -->
</body>
</html>