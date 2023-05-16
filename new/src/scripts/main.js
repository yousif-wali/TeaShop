const updateBookmark = (email)=>{
    let bookmarkElement = document.getElementById("bookmark");
    let xml = new XMLHttpRequest();
    xml.open("GET", "./include/validator.php?getBookmarks="+email);
    xml.onload = function(){
        bookmarkElement.setAttribute('data-total', this.responseText);
    }
    xml.send();
    console.log(email);
}
const addBookmark = (id, email)=>{
    try{
        let xml = new XMLHttpRequest();
        xml.open("GET", "./include/validator.php?addBookmarks="+email+"&id="+id);
        xml.send();
        updateBookmark(email);
    }catch{
        console.log("login");
    }
}
const updateCart = (email)=>{
    let bookmarkElement = document.getElementById("cart");
    let xml = new XMLHttpRequest();
    xml.open("GET", "./include/validator.php?getCarts="+email);
    xml.onload = function(){
        bookmarkElement.setAttribute('data-total', this.responseText);
    }
    xml.send();
    console.log(bookmarkElement);
}
const addCart = (id, email)=>{
    try{
        let xml = new XMLHttpRequest();
        xml.open("GET", "./include/validator.php?addCart="+email+"&id="+id);
        xml.send();
        updateCart(email);
    }catch{
        console.log("login");
    }
}