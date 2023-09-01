
/*let firstName = 'Sam';
let age = 15;

console.log(`Hello Mr ${firstName} your age is ${age}`)*/

const car = {
    carName:'Toyota',
    age: 10,
    price: 10000,
    rate: 0.3,
    sell: function(){
        alert(`This ${this.carName} is ${this.age} years old and it will cost you ${this.price * this.rate} dollars to maintain it`);
    }
};

const customer = {
    custName: "James",
    custAge: 59,
    custBankCred: 10,
    buy: function(name, age, bankCred){
        this.custName = name;
        this.custAge = age;
        this.custBankCred = bankCred;
        if (this.custBankCred < 30)
        {
            console.log(`Sorry ${this.custName}, it seems your Bank Cred of ${this.custBankCred}% is low for this transaction to occur.`)
        }
        else
        {
            console.log(`Congratulations ${customer.custName}, the ${car.carName} can be yours for a price of ${car.price}.`)
        }
    }
};

function printvalue()
{
    var name0 = document.form1.name0.value;
    var name1 = document.form1.name1.value;

    alert("Welcome " + name0 + " " + name1);
}

const myHeading = document.querySelector("h1");
myHeading.textContent = "Hello User"; 

