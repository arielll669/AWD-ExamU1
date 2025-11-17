// send Farmer
async function saveFarmer(formData) {
    const response = await fetch("../php/api_farmer.php", {
        method: "POST",
        body: formData
    });
    return response.json();
}

// send Coop
async function saveCoop(formData) {
    const response = await fetch("../php/api_coop.php", {
        method: "POST",
        body: formData
    });
    return response.json();
}

// sen Chicken
async function saveChicken(formData) {
    const response = await fetch("../php/api_chicken.php", {
        method: "POST",
        body: formData
    });
    return response.json();
}
