<?
$counter=11111;
?>
test<?=$counter?>



<form class="form-test" method="post">
	<input type="hidden" value="data">
	Пример  <input type="submit" value="ссылки">
</form> 

<br>
<br>
<br>
<br>
<form action="/PhoneBook-master-GOOD/PhoneBook-master/redactorContacta.php" method="post" id="form1">
<input type="hidden" name="us" value="Тест Фамилия hidden" id="us"/>
<!-- <input type="userSurname" name="userSurname" value="Тест Фамилия" class="form-control mb-3 mt-3" placeholder="Имя" id="userSurname"> -->
<!-- <input type="submit" value="Add" class="btn btn-info w-100 btn1"> -->
<a href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/redactorContacta.php" id="form_submit">ff</a>
</form>


<script>
    window.addEventListener("load", function() {
    document.getElementById('form_submit').onclick = function (e) {
        e.preventDefault();
        document.getElementById('form1').submit();
    };
});

// $(function () {
//     $('#form_submit').on('click', function (e) {
//         e.preventDefault();

//         $(this).closest('form1').submit();
//     });
// });
</script>