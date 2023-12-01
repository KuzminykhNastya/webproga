
console.log('Первое задание')

function DateAnalysis(day, month, year){
    console.log(year, month, day)
    if ( 0 < year & year < 9999) {
        if (0 < month & month < 13)
        {
            if ((month == 2) & ( 0 < day & day < 30))
            {
                console.log('Корректно');
                return 0;
            }
            if (([1, 3, 5, 7, 8, 10, 12].includes(month)) & 0 < day & day < 32)
            {
                console.log('Корректно');
                return 0;
            }
            if (([4, 6, 9, 11].includes(month)) & (0 < day & day < 31))
            {
                console.log('Корректно');
                return 0;
            } 
            else {console.log('Некорректно');}
        }
        else {console.log('Некорректно');}
    }
    else {console.log('Некорректно');}
}

DateAnalysis(4, 2, 2004)
DateAnalysis(4, 2125, 2004)
DateAnalysis(40, 2, 2004)
DateAnalysis(0, 2, -1)
DateAnalysis(20, 20, 20004)
DateAnalysis(19, 12, 1995)
DateAnalysis(18, 11, 1924)

console.log('Второе задание А')
function Massive_summ(stack)
{
    console.log(stack, "Исходный массив");
    let size = stack.length;
    let count = parseFloat(0);
    for (let i=1; i < size - 1; i++){
        if (Math.abs((stack[i])-Math.E) <= 1e-5) {count = count + stack[i];} 
    }
    console.log(count, "Сумма")

}
var smth = [0.25, 0.5, 0.1, 0.75, 0.0007, 32e-18, 1231e-20, 0, 2.3, 3, 4, 5];
Massive_summ(smth);

console.log('Второе задание Б')

function isprost(num){
    delit_count = 0;
    for (i = 0; i < Math.sqrt(num) + 1; i++)
    {
        if (num % i == 0) {
            delit_count++;
        }
    }
    if (delit_count == 1){
        return true;
    }
    else {return false}
}


console.log( 3,isprost(3))
console.log( 4,isprost(4))
console.log( 5,isprost(5))
console.log(13,isprost(13))
console.log(24, isprost(24))
console.log(31, isprost(31))

var k = 7
if (isprost(k)) {
    console.log( k + ' Является простым')
}
else {console.log(k + ' Не является простым')}

var k = 12
if (isprost(k)) {
    console.log(k + ' Является простым')
}
else {console.log(k +' Не является простым')}


console.log('Четвёртое задание')
function findLongestWord(sentence) 
{
    var words = sentence.split(" ");
    var longestWord = "";
    for (var i = 0; i < words.length; i++) {
      if (words[i].length > longestWord.length) {
        longestWord = words[i];
      }
    }
    console.log("Самое длинное слово: " + longestWord);
  }
  var userInput = prompt("Введите предложение:");
  findLongestWord(userInput);