const donateBtn =  document.getElementById('donateButton');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const slug = document.getElementById('slug').value;
const errLbl = document.getElementById('err-label');

donateBtn.addEventListener('click', async function(){
    let amount = document.getElementById('amount').value;
    if(amount == null || amount <= 0){
        errLbl.innerHTML = "Please enter valid amount";
        return;
    }else{
        try{
            const response = await fetch(`${slug}/generate-token`,{
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                method : 'POST',
                body : JSON.stringify({
                    amount: amount,
                    test: "Test"
                })
            });
            const tokenObj = await response.json();
            window.snap.pay(`${tokenObj.token}`)
            // console.log(tokenObj)
        } catch(err){
            console.log(err);
        }
    }
})