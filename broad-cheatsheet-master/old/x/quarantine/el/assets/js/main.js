/**************************************
          SHOW
**************************************/
let toggleModal = function(id) {
  let modal = document.querySelector(".modal");
  modal.style.display = "block";

  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/el/route.php?&submitType=show&id=" + id, true);
  xhr.onload = function() {
    if (this.status >= 200 && this.status < 400) {
      document.querySelector(".profile-info").innerHTML = this.response;
    } else {
      console.log("We reached our target server, but it returned an error");
    }
  };
  xhr.onerror = function() {
    console.log("There was a connection error of some sort");
  };
  xhr.send();

  window.onclick = function(e) {
    if (e.target == modal) {
      modal.style.display = "none";
    }
  };
};

/**************************************
          PAGINATION + LIMIT
**************************************/
let paginate = function(w, x, y, z) {
  let xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "/el/route.php?submitType=getApplicants&limitResult=" +
      w +
      "&order=" +
      x +
      "&page=" +
      y +
      "&q=" +
      z,
    true
  );
  xhr.onload = function() {
    if (this.status >= 200 && this.status < 400) {
      if (this.response) {
        window.history.pushState(
          "object or string",
          "Title",
          "?q=" + y + "&order=" + x + "&limit=" + w
        );
        document.querySelector("#datatable").innerHTML = this.response;
      } else {
        console.log("error");
      }
    } else {
      console.log("We reached our target server, but it returned an error");
    }
  };
  xhr.onerror = function() {
    console.log("There was a connection error of some sort");
  };
  xhr.send();
};

/**************************************
            SEARCH
**************************************/
let search = function(x) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/el/route.php?submitType=getApplicants&q=" + x, true);
  xhr.onload = function() {
    if (this.status >= 200 && this.status < 400) {
      if (this.response) {
        document.querySelector("#datatable").innerHTML = this.response;
      } else {
        console.log("error");
      }
    } else {
      console.log("We reached our target server, but it returned an error");
    }
  };
  xhr.onerror = function() {
    console.log("There was a connection error of some sort");
  };
  xhr.send();
};

/**************************************
            ORDER
**************************************/
let order = function(w, x, y, z) {
  let xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "/el/route.php?submitType=getApplicants&order=" +
      w +
      "&limitResult=" +
      x +
      "&q=" +
      y +
      "&sort=" +
      z,
    true
  );
  xhr.onload = function() {
    if (this.status >= 200 && this.status < 400) {
      if (this.response) {
        document.querySelector("#datatable").innerHTML = this.response;
      } else {
        console.log("error");
      }
    } else {
      console.log("We reached our target server, but it returned an error");
    }
  };
  xhr.onerror = function() {
    console.log("There was a connection error of some sort");
  };
  xhr.send();
};

const edit = function() {
  event.preventDefault();
  let error = 0;
  const form = {
    firstName: document.forms["edit-form"]["firstName"],
    lastName: document.forms["edit-form"]["lastName"],
    address: document.forms["edit-form"]["address"]
  };

  // VALIDATE firstName
  if (form.firstName.value == null || form.firstName.value == "") {
    form.firstName.classList.add("is-invalid");
    form.firstName.nextElementSibling.innerHTML = "Firstname is required";
    error += 1;
  }

  if (form.lastName.value == null || form.lastName.value == "") {
    form.lastName.classList.add("is-invalid");
    form.lastName.nextElementSibling.innerHTML = "Lastname is required";
    error += 1;
  }

  if (form.address.value == null || form.address.value == "") {
    form.address.classList.add("is-invalid");
    form.address.nextElementSibling.innerHTML = "Address is required";
    error += 1;
  }

  if (error === 0) {
    document.querySelector("#edit-form").submit();
  }
};
