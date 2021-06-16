var BlzPassword = function($input, options) {
	if (!$input) {
		return;
	}

	if (window.DOMTokenList && !window.DOMTokenList.prototype.forEach) {
		window.DOMTokenList.prototype.forEach = function (callback, thisArg) {
			thisArg = thisArg || window;
			for (var i = 0; i < this.length; i++) {
				callback.call(thisArg, this[i], i, this);
			}
		};
	}

	if (document.msCapsLockWarningOff === false) {
		document.msCapsLockWarningOff = true;
	}

	this.visibilityToggle = options ? options.visibilityToggle : true;
	this.strengthIndicator = options ? options.strengthIndicator : false;
	this.passwordStrengthValues = this.strengthIndicator ? options.strengthValues : [];
	this.passwordStrengthText = this.strengthIndicator ? options.strengthText : {};
	this.passwordStrengthDefaultLabel = this.strengthIndicator ? options.strengthDefaultText : "";
	this.tabIndex = options ? options.tabIndex : 0;
	this.capsLockOn = false;
	this.showPassword = false;


	var viewPasswordButton;

	// see if view password button already exists if visibilityToggle is true
	if (this.visibilityToggle) {
		viewPasswordButton = this.findSibling($input, ".view-password-button");
	}

	var wrapper = document.createElement("div");
	wrapper.classList.add("blz-password-wrapper");
	$input.parentNode.insertBefore(wrapper, $input);
	wrapper.appendChild($input);

	if (this.visibilityToggle && viewPasswordButton) {
		wrapper.appendChild(viewPasswordButton);
	}

	var capsLockSpan = document.createElement("span");
	capsLockSpan.classList.add("caps-lock-indicator");
	capsLockSpan.classList.add("hide");
	var capsLockIcon = document.createElement("i");
	capsLockIcon.classList.add("fas");
	capsLockIcon.classList.add("fa-arrow-alt-square-up");
	capsLockSpan.appendChild(capsLockIcon);

	if (this.visibilityToggle) {
		// check if button wrapper exists before creating it
		if (!viewPasswordButton) {
			viewPasswordButton = document.createElement("span");
			viewPasswordButton.classList.add("view-password-button");
			viewPasswordButton.setAttribute("tabIndex", this.tabIndex.toString());
			viewPasswordButton.setAttribute("aria-live", "assertive");
			viewPasswordButton.setAttribute("role", "button");
		}

		var viewPasswordIcon = document.createElement("i");
		viewPasswordIcon.classList.add("show-password");
		viewPasswordIcon.classList.add("fas");
		viewPasswordIcon.classList.add("fa-eye");
		var hidePasswordIcon = document.createElement("i");
		hidePasswordIcon.classList.add("hide-password");
		hidePasswordIcon.classList.add("hide");
		hidePasswordIcon.classList.add("fas");
		hidePasswordIcon.classList.add("fa-eye-slash");

		// add aria labels
		var showPassAriaText = $input.getAttribute("data-password-show-aria");
		var hidePassAriaText = $input.getAttribute("data-password-hide-aria");

		if (showPassAriaText) {
			viewPasswordIcon.setAttribute("aria-label", showPassAriaText);
		}

		if (hidePassAriaText) {
			hidePasswordIcon.setAttribute("aria-label", hidePassAriaText);
		}


		// append elements
		viewPasswordButton.appendChild(viewPasswordIcon);
		viewPasswordButton.appendChild(hidePasswordIcon);
		wrapper.appendChild(viewPasswordButton);
	}
	wrapper.appendChild(capsLockSpan);

	this.$blzPassword = wrapper;
};

BlzPassword.prototype = {
	init: function() {
		if (!this.$blzPassword) {
			return;
		}

		var input = this.$blzPassword.querySelector("input");
		input.addEventListener("keydown", this.capsLockListener.bind(this));
		input.addEventListener("keyup", this.capsLockListener.bind(this));
		input.addEventListener("click", this.capsLockListener.bind(this));
		input.addEventListener("focus", this.capsLockListener.bind(this));
		input.addEventListener("blur", this.clearIndicators.bind(this));
		var viewPasswordButton = this.$blzPassword.querySelector(".view-password-button");
		viewPasswordButton.addEventListener("click", this.togglePassword.bind(this));
		viewPasswordButton.addEventListener("keydown", this.handlePasswordButton.bind(this));
		if (this.strengthIndicator === true) {
			this.createStrengthIndicator();
		}
	},
	createStrengthIndicator: function() {
		var progressBar = document.createElement("progress");
		progressBar.classList.add("password-strength-meter");
		progressBar.setAttribute("max", "100");
		progressBar.setAttribute("value", "0");
		var strengthLabel = document.createElement("div");
		strengthLabel.classList.add("password-strength-status");
		this.$blzPassword.appendChild(progressBar);
		this.$blzPassword.appendChild(strengthLabel);
		this.setPasswordStrengthText(this.passwordStrengthDefaultLabel);
	},
	capsLockListener: function(e) {
		if (e.type === "focus") {
			e.target.click();
			return;
		}

		this.setCapsLock(false);
	},
	setCapsLock: function(value) {
		var capsLockIndicator = this.$blzPassword.querySelector(".caps-lock-indicator");
		if (value === true) {
			capsLockIndicator.classList.remove("hide");
		} else {
			capsLockIndicator.classList.add("hide");
		}

		this.capsLockOn = value;
	},
	togglePassword: function() {
		if (this.showPassword === true) {
			this.displayPassword(false);
		} else {
			this.displayPassword(true);
		}
	},
	handlePasswordButton: function(e) {
		if (e.type === "keydown" && e.keyCode !== 13) {
			return false;
		}

		this.togglePassword();
		return false;
	},
	displayPassword: function(value) {
		if (value === true) {
			this.$blzPassword.querySelector("input").setAttribute("type", "text");
			this.$blzPassword.querySelector(".show-password").classList.add("hide");
			this.$blzPassword.querySelector(".hide-password").classList.remove("hide");
			this.$blzPassword.querySelector(".view-password-button").setAttribute("aria-pressed", "true");
		} else {
			this.$blzPassword.querySelector("input").setAttribute("type", "password");
			this.$blzPassword.querySelector(".hide-password").classList.add("hide");
			this.$blzPassword.querySelector(".show-password").classList.remove("hide");
			this.$blzPassword.querySelector(".view-password-button").setAttribute("aria-pressed", "false");
		}

		this.showPassword = value;
	},
	clearIndicators: function(e) {
		if (!e.target.classList.contains("view-password-button") &&
			!e.target.classList.contains("caps-lock-indicator")) {
			this.setCapsLock(false);
		}
	},
	findSibling: function(node, sibling) {
		if (!node || !sibling) {
			return;
		}

		var elem = node.nextElementSibling;
		while (elem) {
			if (elem.matches(sibling)) {
				return elem;
			}
			elem = elem.nextElementSibling;
		}
	},
	computePasswordStrength: function(passwordStrengthValueIdx) {
		var value = this.$blzPassword.querySelector("input").value;
		if (value !== "" && passwordStrengthValueIdx !== null && passwordStrengthValueIdx !== "") {
			var sectionSize = 100 / this.passwordStrengthValues.length;
			if (passwordStrengthValueIdx >= this.passwordStrengthValues.length) {
				passwordStrengthValueIdx = this.passwordStrengthValues.length - 1;
			}
			var passwordStrengthValue = this.passwordStrengthValues[passwordStrengthValueIdx];
			var passwordStrengthText = this.passwordStrengthText[passwordStrengthValue] || passwordStrengthValue;
			this.setPasswordStrengthText(passwordStrengthText, passwordStrengthValue);
			document.querySelector(".password-strength-meter").value = (passwordStrengthValueIdx + 1) * sectionSize;
			return;
		}
		this.setPasswordStrengthText(this.passwordStrengthDefaultLabel, "");

		document.querySelector(".password-strength-meter").value = 0;
	},
	setPasswordStrengthText: function(passwordStrengthText, passwordStrengthValue) {
		document.querySelector(".password-strength-status").innerHTML = passwordStrengthText;
		var strengthMeter = document.querySelector(".password-strength-meter");
		strengthMeter.classList.forEach(function(value) {
			if (value !== "password-strength-meter") {
				strengthMeter.classList.remove(value);
			}
		});
		if (passwordStrengthValue) {
			strengthMeter.classList.add("strength-" + passwordStrengthValue.toLowerCase().replace(" ", "-"));
		}
	}
};
