$(document).ready(() => {
  user = localStorage.getItem("user");
  if (user) {
    $(".top").html(
      ` <div class="nav">
        <ul class="menu">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="requests.php">Requests</a>
          </li>
          <li>
            <a href="donors.php">Donors</a>
          </li>
          <li>
            <a href="blogs.php">Blog</a>
          </li>
          <li class="right login">
            <a href="user.php">${user}</a>
          </li>
          <li id="nav-reg">
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>`
    );
  } else {
    $(".top").html(
      ` <div class="nav">
        <ul class="menu">
        <li>
        <a href="index.php">Home</a>
      </li>
        <li>
        <a href="requests.php">Requests</a>
      </li>
      <li>
        <a href="donors.php">Donors</a>
      </li>
      <li>
        <a href="blogs.php">Blog</a>
      </li>
          <li class="right login">
            <a href="signin.php">Login</a>
          </li>
          <li id="nav-reg">
            <a href="signup.php">Registration</a>
          </li>
        </ul>
      </div>`
    );
  }

  var i = 1;
  const images = [
    "https://pbs.twimg.com/media/Dfo9IwVV4AAmWWq.jpg",
    "http://allvectorlogo.com/img/2016/09/save-a-life-give-blood-logo.png",
    "https://sgp1.digitaloceanspaces.com/cosmosgroup/news/5255213_world-blood-donor-day.png",
  ];
  $("#carousel-img").attr("src", images[0]);
  setInterval(() => {
    changeImage();
  }, 3000);

  function changeImage() {
    $("#carousel-img").attr("src", images[i]);

    i++;
    if (i == images.length) {
      i = 0;
    }
  }
});
