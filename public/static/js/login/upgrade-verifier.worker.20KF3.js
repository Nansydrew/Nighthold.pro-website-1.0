onmessage = function(e) {
	var serverResourceUrl = e.data[0];
	var srpParams = e.data[1];
	var password = e.data[2];

	importScripts(serverResourceUrl);

	var arrayBufferToHexString = function(arrayBuffer) {
		var byteArray = arrayBuffer;
		var hexString = '';
		var nextHexByte;

		for (var i = 0; i < byteArray.byteLength; i++) {
			nextHexByte = byteArray[i].toString(16);
			if (nextHexByte.length < 2) {
				nextHexByte = '0' + nextHexByte;
			}
			hexString += nextHexByte;
		}
		return hexString;
	};

	var passwordVersion2 = new accountPassword.PasswordVersion2(15000);
	var passwordManager = new accountPassword.PasswordManager(srpParams.salt);
	passwordManager.generateVerifier(srpParams.username, password, passwordVersion2)
		.then(function (v) {
			var encodedVerifier  = passwordVersion2.encodeVerifier(v);
			var encodedVerifierHex = arrayBufferToHexString(new Uint8Array(encodedVerifier));
			postMessage([encodedVerifierHex]);
		});
};
