document.getElementById("myForm").addEventListener("submit", function(event) { 
    event.preventDefault(); // Prevents the form from submitting

    // Get the values of the input fields
    const name = document.getElementById("name").value.trim();
    const surname = document.getElementById("surname").value.trim();
    const phoneNum = document.getElementById("phoneNum").value.trim();
    const email = document.getElementById("email").value.trim();
    const country = document.getElementById("country").value;
    const update = document.getElementById("update").checked ? "Yes" : "No";

    // Check if a gender is selected before accessing its value
    const genderInput = document.querySelector('input[name="gender"]:checked');
    const gender = genderInput ? genderInput.value : "Not specified"; 

    // Display the values in the console
    console.log("Όνομα:", name);
    console.log("Επώνυμο:", surname);
    console.log("Τηλέφωνο:", phoneNum);
    console.log("Email:", email);
    console.log("Φύλο:", gender);
    console.log("Χώρα:", country);
    console.log("Ανανέωση:", update);

    // Display the values in the HTML
    document.getElementById("data").innerHTML = `
        Όνομα: ${name}<br>
        Επώνυμο: ${surname}<br>
        Τηλέφωνο: ${phoneNum}<br>
        Email: ${email}<br>
        Φύλο: ${gender}<br>
        Χώρα: ${country}<br>
        Ανανέωση: ${update}
    `;

    document.querySelector("main").style.display = "block"; // Display the section

    // Display an alert box with a message
    alert("Τα δεδομένα σας καταχωρήθηκαν με επιτυχία!");
});
