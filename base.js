function b64EncodeUnicode(str) {
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
        return String.fromCharCode('0x' + p1);
    }));
}
function b64DecodeUnicode(str) {
    // Going backwards: from bytestream, to percent-encoding, to original string.
    return decodeURIComponent(atob(str).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
}

// var Vito = b64DecodeUnicode('aHR0cDovL3d3dy5hbml0dWJleC5uZXQvdmlkZW8vNzM1MzE'); // "✓ à la mode"
// var Vitali = b64DecodeUnicode('aHR0cDovL3d3dy5hbml0dWJleC5uZXQvdmlkZW8vNzM1MzE'); 
 // Vitali += '\n\n\n--<br>'+  b64EncodeUnicode('http://www.anitubex.net/video/73531'); // "Vml0YWxpOkRvbmdodmFuaQ=="
// Vito += '\n\n\n--<br>'+b64EncodeUnicode('http://www.anitubex.net/video/73531'); // "Vml0bzpEb25naHZhbmk="
// console.log(Vitali, '', Vito);