var usersArr = [
    {username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
    {username: 'Anna Nowak', birthYear: 1994, salary: 7500},
    {username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
    {username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
    {username: 'Marek Sinica', birthYear: 1989, salary: 7200},
    {username: 'Kamila Wisniewska', birthYear: 1972, salary: 6800},
    ];

function welcomeUsers(array)
{
    if (!Array.isArray(array)) return false;

    for (key in array) {
        if (array[key].salary>15000) { 
            console.log("Witaj, prezesie!");
            continue;
        }
        if (array[key].salary<5000) { 
            console.log(array[key].username+", szykuj sie na podwyzke!");
            continue;
        }
        if (array[key].birthYear % 2 == 0) { 
            console.log("Witaj, "+ array[key].username +"! W tym roku konczysz "+(2022-array[key].birthYear)+" lat!");
            continue;
        }
        if (array[key].birthYear % 2 == 1) { 
            console.log(array[key].username+", jestes zwolniony!");
            continue;
        }
    }
}
