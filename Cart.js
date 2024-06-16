document.addEventListener('DOMContentLoaded', function() {
    let cartItems = JSON.parse(localStorage.getItem('cart'));
    let table = document.getElementById('CartItems');
    for(let obj of cartItems)
    {
        let row  = document.createElement('tr')
        row.innerHTML = `
           <td class="Medicine_id"> ${obj.Medicine_id}</td>
           <td class="Medicine_name"> ${obj.Medicine_name}</td>
           <td class="diseases"> ${obj.Diseases}</td>
           <td class="selling_price"> ${obj.selling_price}</td>
           <td class="Remove"><button onclick='Remove(${obj.Medicine_id})'> Remove From Cart </button></td>
        `
        table.appendChild(row)
    }
});
function Remove(id)
{
    let table = document.getElementById('CartItems').getElementsByTagName('tr');
    for(let row of table)
    {
        let td = row.querySelector('.Medicine_id');
        if(td && td.innerText.trim() == id)
        {
            row.style.display = "none";
            let CartItems = JSON.parse(localStorage.getItem('Cart'));
            let updated = [];
            for(let obj of CartItems)
            {
                if(obj[Medicine_id] != id)
                updated.push(obj);
            }
            console.log(updated)
            localStorage.clear();
        }
    }
}