
let table = document.getElementById("Medicines")
let Rows = table.getElementsByTagName('tr')
const Search = () => {
    let searchfield = document.getElementById("Search")
    let s = searchfield.value.toLowerCase();
    for (let i = 1; i < Rows.length; i++) {

        let data = Rows[i];
        let Names = data.getElementsByTagName('td')
        let found = false;
        let index = 0;
        let k = 0;
        for (let text of Names) {
            if( k == 4 || k == 3 ) break;
            let value_of_cell = text.textContent.toLowerCase(); 
            if (s == "" || value_of_cell.indexOf(s) > -1) {
                found = true;
                index = value_of_cell.indexOf(s);
                let p = text.textContent;
                // handled empty case
                
                if(s == ""){
                    index = 0;
                    ++k;
                    p = p.slice(0);
                    text.innerHTML= `${p}`;
                    continue;
                }
                let highlight = p.substr(index, s.length);
                let rem = p.slice(index + s.length);
                p = p.slice(0, index); text.innerHTML="";
                console.log(p +" " + highlight+ " " + rem + " " +s.length + " " + index);
                text.innerHTML= `${p}<p style='color:red; display:inline;'>${highlight}</p>${rem}`;
                break;
            }
            ++k;
        }
        if (found) {
            data.style.display = "";


        } else {
            data.style.display = "none";
        }
    }
}
function Cart() {
    location.href = "Cart.php"
}


function AddIntoRecord(id, username)
{
    id = Number.parseInt(id);
    formElement.action = "User_Purchased.php?user=username&medicineid=id";
    formElement.submit();
}