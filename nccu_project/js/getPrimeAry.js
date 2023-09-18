/*

    Test Web Worker

*/

function getprime(startNum, endNum){
    let primeAry = [];
    for(let i = startNum; i <= endNum; i++){
        let max = i - 1;
        let j;
        for(j = max; j > 1; j--){
            if(i % j == 0){               
                break;
            }
        }
        if(j == 1){
            primeAry.push(i);            
        }
    }
    var primeAryStr = primeAry.toString();
    return primeAryStr;
}

onmessage = function(event){
    let primeFromNum = event.data.from;
    let primeToNum = event.data.to;
    let primeResult = 
    "The Primes in range " + primeFromNum +
    " to " + primeToNum + " are " + getprime(primeFromNum, primeToNum);
    this.postMessage(primeResult);
}


