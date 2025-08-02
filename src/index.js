let amounts = document.querySelectorAll(".amount")
let old_amounts = [];
amounts.forEach(amount => {
    old_amounts.push(amount.innerText);
});
let oud_aantal = document.getElementById("amount_for").value
console.log("aantal personen = " + amount_for)

function changeIngred()
{
    let nieuw_aantal = document.getElementById("amount_for").value
    let factor = nieuw_aantal / oud_aantal;
    let i = 0;
    amounts.forEach(amount => {
        amount.innerText = old_amounts[i] * factor;
        i++;
     });
}