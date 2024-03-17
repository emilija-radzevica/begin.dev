// import './bootstrap';

window.show = function() {
    console.log("This works as well");
    var category = document.getElementById('category-input');
    var age = document.getElementById('age');
    var cclass = document.getElementById('class');
    var subclass = document.getElementById('subclass');
    var species = document.getElementById('species');
    var climate = document.getElementById('climate');
    var owner = document.getElementById('owner');
    var aspect = document.getElementById('aspect');
    var cultureRegion = document.getElementById('culture-region');
    var speciesRegion = document.getElementById('species-region');
    
    console.log("hello");

    if (category.value == 1) {
        age.style.display = "flex";
        cclass.style.display = "flex";
        subclass.style.display = "flex";
        species.style.display = "flex";
    } else {
        age.style.display = "none";
        cclass.style.display = "none";
        subclass.style.display = "none";
        species.style.display = "none";
    }
    if (category.value == 2) {
        climate.style.display = "flex";
        owner.style.display = "flex";
    } else {
        climate.style.display = "none";
        owner.style.display = "none";
    }
    if (category.value == 3) {
        owner.style.display = "flex";
    } else {
        owner.style.display = "none";
    }
    if (category.value == 4) {
        aspect.style.display = "flex";
        cultureRegion.style.display = "flex";
    } else {
        aspect.style.display = "none";
        cultureRegion.style.display = "none";
    }
    if (category.value == 5) {
        speciesRegion.style.display = "flex";
    } else {
        speciesRegion.style.display = "none";
    }
}
      
