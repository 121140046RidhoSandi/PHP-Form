function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const age = document.getElementById("age").value.trim();
    const bio = document.getElementById("bio").value.trim();
    const fileInput = document.getElementById("file");

    if (name.length < 3 || name.length > 50) {
        alert("Nama harus memiliki panjang 3-50 karakter.");
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Email tidak valid.");
        return false;
    }

    if (age < 1 || age > 100) {
        alert("Umur harus antara 1-100.");
        return false;
    }

    if (bio.length > 200) {
        alert("Biografi tidak boleh lebih dari 200 karakter.");
        return false;
    }

    const file = fileInput.files[0];
    if (file && file.size > 2 * 1024 * 1024) {
        alert("File tidak boleh lebih dari 2MB.");
        return false;
    }

    return true;
}
