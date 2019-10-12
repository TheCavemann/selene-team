<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/64f240fcea.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<style>
.accordion {
  background-color: #eee;
  border:1px solid deepskyblue;
  border-radius: 25px;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  text-align: center;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}
.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.default-faq {
  text-align: center;
  width: 80%;
  margin: 0 auto;
}
.default{
    height: 100% !important;
    position: relative !important;
    font-family: 'Raleway', sans-serif;
    font-size: 1em !important;
    padding: 1em 0.63em !important;
    overflow: hidden;
    background-image: linear-gradient(135deg,#000000 0%,#7f8c8d 74%);
    color: red;
}
.default-item {
  padding: 10px;
  margin: 0 10px;
}
.default-item a {
  text-decoration: none;
}
.test {
  padding-left: 35rem;
  
}
.navbar-toggler {
  background: #fff;
}
@media only screen and (max-width: 550px) {
  .default {
    height: 100% !important;
  }
  .test{
    padding-left: 0;
    text-align: center
  }
  .default-item {
    padding: 10px;
  }
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg  default">
  <a class="navbar-brand" href="#">
  <b>Net</b><span class="checker">Checker</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right test">
      <li class="nav-item default-item">
        <a href="faq.php" style='color:#d35908'><strong>Frequently Asked Questions</strong> </a>
        </li>
        <li class="nav-item default-item">
        <a href="sign-in.php" style='color:#d35908'><strong>sign in</strong> </a>
        </li>
        <li class="nav-item default-item">
        <a href="sign-up.php" style='color:#d35908'><strong>Signup</strong> </a>
        </li>
    </ul>
  </div>
</nav>
<h2 class='text-center'>Frequently Asked Questions</h2><br>
<div class='default-faq'>
<button class="accordion">What exactly is net worth?</button>
<div class="panel">
  <p>There is a simple formula that easily defines net worth. Add up all your assets—income, savings, investments and property. Then subtract all your existing debts. The total is your net worth.</p>
</div><br><br>
<button class="accordion">When will I need to know my net worth?</button>
<div class="panel">
  <p>While you won’t need to keep track of your net worth on a day to day basis, there are critical moments when it’s a good idea to have a firm grasp of your true value. You may want to understand the long-term trends for your net worth (how quickly you’re making or losing value) when planning your retirement or your estate. You may need it when looking to secure a mortgage or apply for student loans on behalf of your children.</p>
</div><br><br>
<button class="accordion">How net worth is calculated?</button>
<div class="panel">
  <p>Net worth is the value of all assets, minus the total of all liabilities. Put another way, net worth is what is owned minus what is owed. This net worth calculator helps determine your net worth. It also estimates how net worth could grow or decline over the next 10 years.</p>
</div><br><br>
<button class="accordion">Which calculator should i use?</button>
<div class="panel">
  <p>Selene Networth calculator is very easy to use and efficient</p>
</div><br><br>
<button class="accordion">Is Selene Calculator free to use?</button>
<div class="panel">
  <p>yes it is. but you would have to sign up so as to be able to store and track your networth history. you can use the getstarted button below this page to sign up</p>
</div><br><br>
<p>
<button class="accordion">How do you account for outstanding car loans and mortgage payments?</button>
<div class="panel">
  <p>When incorporating existing loans into your net worth calculation, you cannot truly consider houses or vehicles as assets until they’ve been paid for in full. So if you took out a $100,000 mortgage and have paid off $99,000, your home is still considered a $1,000 liability. But once you’ve made your last payment your home becomes a $100,000 asset</p>
</div></p>
</div>

<div class="text-center">
<a href="sign-up.php" class="checker started">GET STARTED</a>
</div>
<script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
          });
        }
        </script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
