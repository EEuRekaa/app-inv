function onScanSuccess(decodedText, decodedResult) {
        //(`Code scanned = ${decodedText}`, decodedResult);  
        window.location.href = "camera.php?text=" + decodedText + "&result=" + decodedResult ;
}
var html5QrcodeScanner = new Html5QrcodeScanner(
	"qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);