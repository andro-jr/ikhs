! function (t, e, i, n) {
	"use strict";
	var s = "pincodeInput",
	o = {
		placeholders: void 0,
		inputs: 4,
		hidedigits: !0,
		keydown: function (t) {},
		change: function (t, e, i) {},
		complete: function (t, e, i) {}
	};
	
	function a(e, i) {
		this.element = e, this.settings = t.extend({}, o, i), this._defaults = o, this._name = s, this.init()
	}
	t.extend(a.prototype, {
		init: function () {
			this.buildInputBoxes()
		},
		updateOriginalInput: function () {
			var e = "";
			t(".rgotp-input-text", this._container).each(function (i, n) {
				e += t(n).val().toString()
			}), t(this.element).val(e)
		},
		check: function () {
			var e = !0,
			i = "";
			return t(".rgotp-input-text", this._container).each(function (n, s) {
				i += t(s).val().toString(), t(s).val() || (e = !1)
			}), this._isTouchDevice() ? i.length == this.settings.inputs || void 0 : e
		},
		buildInputBoxes: function () {
			this._container = t("<div />").addClass("rgotp-input-container");
			var e = [],
			i = [],
			n = "";
			if (this.settings.placeholders && (i = this.settings.placeholders.split(" "), n = this.settings.placeholders.replace(/ /g, "")), 0 == this.settings.hidedigits && "" != t(this.element).val() && (e = t(this.element).val().split("")), this.settings.hidedigits && (this._pwcontainer = t("<div />").css("display", "none").appendTo(this._container), this._pwfield = t("<input>").attr({
				type: "password",
				pattern: "[0-9]*",
				inputmode: "numeric",
				autocomplete: "off"
				}).appendTo(this._pwcontainer)), this._isTouchDevice()) {
				t(this._container).addClass("touch");
				for (var s = t("<div />").addClass("touchwrapper touch" + this.settings.inputs).appendTo(this._container), o = t("<input>").attr({
					type: "number",
					pattern: "[0-9]*",
					placeholder: n,
					inputmode: "numeric",
					maxlength: this.settings.inputs,
					autocomplete: "off"
				}).addClass("form-control rgotp-input-text").appendTo(s), a = t("<table>").addClass("touchtable").appendTo(s), p = t("<tr/>").appendTo(a), r = 0; r < this.settings.inputs; r++) r == this.settings.inputs - 1 ? t("<td/>").addClass("last").appendTo(p) : t("<td/>").appendTo(p);
				this.settings.hidedigits ? o.attr("type", "password") : o.val(e[r]), this._addEventsToInput(o, 1)
			} else
			for (r = 0; r < this.settings.inputs; r++) {
				o = t("<input>").attr({
					type: "text",
					maxlength: "1",
					autocomplete: "off",
					placeholder: i[r] ? i[r] : void 0
				}).addClass("form-control rgotp-input-text").appendTo(this._container);
				this.settings.hidedigits ? o.attr("type", "password") : o.val(e[r]), 0 == r ? o.addClass("first") : r == this.settings.inputs - 1 ? o.addClass("last") : o.addClass("mid"), this._addEventsToInput(o, r + 1)
			}
			this._error = t("<div />").addClass("text-danger pincode-input-error").appendTo(this._container), t(this.element).css("display", "none"), this._container.insertBefore(this.element)
		},
		enable: function () {
			t(".rgotp-input-text", this._container).each(function (e, i) {
				t(i).prop("disabled", !1)
			})
		},
		disable: function () {
			t(".rgotp-input-text", this._container).each(function (e, i) {
				t(i).prop("disabled", !0)
			})
		},
		focus: function () {
			t(".rgotp-input-text", this._container).first().select().focus()
		},
		clear: function () {
			t(".rgotp-input-text", this._container).each(function (e, i) {
				t(i).val("")
			}), this.updateOriginalInput()
		},
		_isTouchDevice: function () {
			//if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) return !0
		},
		_addEventsToInput: function (e, i) {
			e.on("focus", function (t) {
				this.select()
				}), e.on("keydown", t.proxy(function (e) {
				if (this._pwfield && (t(this._pwfield).attr({
					type: "text"
				}), t(this._pwfield).val("")), this._isTouchDevice()) 8 == e.keyCode || 46 == e.keyCode || t(this.element).val().length == this.settings.inputs && (e.preventDefault(), e.stopPropagation());
				else try {
					"Backspace" == e.key || "Tab" == e.key || "Delete" == e.key || "Del" == e.key || e.key >= 0 && e.key <= 9 || (e.preventDefault(), e.stopPropagation())
					} catch (t) {
					8 == e.keyCode || 9 == e.keyCode || 46 == e.keyCode || e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 96 && e.keyCode <= 105 || (e.preventDefault(), e.stopPropagation())
				}
				this.settings.keydown(e)
				}, this)), e.on("keyup", t.proxy(function (e) {
				this._isTouchDevice() || (8 == e.keyCode || 46 == e.keyCode ? (t(e.currentTarget).prev().select(), t(e.currentTarget).prev().focus()) : "" != t(e.currentTarget).val() && (t(e.currentTarget).next().select(), t(e.currentTarget).next().focus())), this.updateOriginalInput(), this.check() && this.settings.complete(t(this.element).val(), e, this._error), this.settings.change && this.settings.change(e.currentTarget, t(e.currentTarget).val(), i), this._isTouchDevice() && (8 == e.keyCode || 46 == e.keyCode || t(this.element).val().length == this.settings.inputs && t(e.currentTarget).blur())
			}, this))
		}
		}), t.fn[s] = function (e) {
		return this.each(function () {
			t.data(this, "plugin_" + s) || t.data(this, "plugin_" + s, new a(this, e))
		})
	}
}(jQuery, window, document),
function (t, e, i, n) {
	"use strict";
	var s = "pincodeInput",
	o = {
		placeholders: void 0,
		inputs: 4,
		hidedigits: !0,
		keydown: function (t) {},
		change: function (t, e, i) {},
		complete: function (t, e, i) {}
	};
	
	function a(e, i) {
		this.element = e, this.settings = t.extend({}, o, i), this._defaults = o, this._name = s, this.init()
	}
	t.extend(a.prototype, {
		init: function () {
			this.buildInputBoxes()
		},
		updateOriginalInput: function () {
			var e = "";
			t(".prodetailotpinputpopup", this._container).each(function (i, n) {
				e += t(n).val().toString()
			}), t(this.element).val(e)
		},
		check: function () {
			var e = !0,
			i = "";
			return t(".prodetailotpinputpopup", this._container).each(function (n, s) {
				i += t(s).val().toString(), t(s).val() || (e = !1)
			}), this._isTouchDevice() ? i.length == this.settings.inputs || void 0 : e
		},
		buildInputBoxes: function () {
			this._container = t("<div />").addClass("BB-input-otp");
			var e = [],
			i = [],
			n = "";
			if (this.settings.placeholders && (i = this.settings.placeholders.split(" "), n = this.settings.placeholders.replace(/ /g, "")), 0 == this.settings.hidedigits && "" != t(this.element).val() && (e = t(this.element).val().split("")), this.settings.hidedigits && (this._pwcontainer = t("<div />").css("display", "none").appendTo(this._container), this._pwfield = t("<input>").attr({
				type: "password",
				pattern: "[0-9]*",
				inputmode: "numeric",
				autocomplete: "off"
				}).appendTo(this._pwcontainer)), this._isTouchDevice()) {
				t(this._container).addClass("touch");
				for (var s = t("<div />").addClass("touchwrapper touch" + this.settings.inputs).appendTo(this._container), o = t("<input>").attr({
					type: "number",
					pattern: "[0-9]*",
					placeholder: n,
					inputmode: "numeric",
					maxlength: this.settings.inputs,
					autocomplete: "off"
				}).addClass("form-control prodetailotpinputpopup").appendTo(s), a = t("<table>").addClass("touchtable").appendTo(s), p = t("<tr/>").appendTo(a), r = 0; r < this.settings.inputs; r++) r == this.settings.inputs - 1 ? t("<td/>").addClass("last").appendTo(p) : t("<td/>").appendTo(p);
				this.settings.hidedigits ? o.attr("type", "password") : o.val(e[r]), this._addEventsToInput(o, 1)
			} else
			for (r = 0; r < this.settings.inputs; r++) {
				o = t("<input>").attr({
					type: "text",
					maxlength: "1",
					autocomplete: "off",
					placeholder: i[r] ? i[r] : void 0
				}).addClass("form-control prodetailotpinputpopup").appendTo(this._container);
				this.settings.hidedigits ? o.attr("type", "password") : o.val(e[r]), 0 == r ? o.addClass("first") : r == this.settings.inputs - 1 ? o.addClass("last") : o.addClass("mid"), this._addEventsToInput(o, r + 1)
			}
			this._error = t("<div />").addClass("text-danger pincode-input-error").appendTo(this._container), t(this.element).css("display", "none"), this._container.insertBefore(this.element)
		},
		enable: function () {
			t(".prodetailotpinputpopup", this._container).each(function (e, i) {
				t(i).prop("disabled", !1)
			})
		},
		disable: function () {
			t(".prodetailotpinputpopup", this._container).each(function (e, i) {
				t(i).prop("disabled", !0)
			})
		},
		focus: function () {
			t(".prodetailotpinputpopup", this._container).first().select().focus()
		},
		clear: function () {
			t(".prodetailotpinputpopup", this._container).each(function (e, i) {
				t(i).val("")
			}), this.updateOriginalInput()
		},
		_isTouchDevice: function () {
			//if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) return !0
		},
		_addEventsToInput: function (e, i) {
			e.on("focus", function (t) {
				this.select()
				}), e.on("keydown", t.proxy(function (e) {
				if (this._pwfield && (t(this._pwfield).attr({
					type: "text"
				}), t(this._pwfield).val("")), this._isTouchDevice()) 8 == e.keyCode || 46 == e.keyCode || t(this.element).val().length == this.settings.inputs && (e.preventDefault(), e.stopPropagation());
				else try {
					"Backspace" == e.key || "Tab" == e.key || "Delete" == e.key || "Del" == e.key || e.key >= 0 && e.key <= 9 || (e.preventDefault(), e.stopPropagation())
					} catch (t) {
					8 == e.keyCode || 9 == e.keyCode || 46 == e.keyCode || e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 96 && e.keyCode <= 105 || (e.preventDefault(), e.stopPropagation())
				}
				this.settings.keydown(e)
				}, this)), e.on("keyup", t.proxy(function (e) {
				this._isTouchDevice() || (8 == e.keyCode || 46 == e.keyCode ? (t(e.currentTarget).prev().select(), t(e.currentTarget).prev().focus()) : "" != t(e.currentTarget).val() && (t(e.currentTarget).next().select(), t(e.currentTarget).next().focus())), this.updateOriginalInput(), this.check() && this.settings.complete(t(this.element).val(), e, this._error), this.settings.change && this.settings.change(e.currentTarget, t(e.currentTarget).val(), i), this._isTouchDevice() && (8 == e.keyCode || 46 == e.keyCode || t(this.element).val().length == this.settings.inputs && t(e.currentTarget).blur())
			}, this))
		}
		}), t.fn[s] = function (e) {
		return this.each(function () {
			t.data(this, "plugin_" + s) || t.data(this, "plugin_" + s, new a(this, e))
		})
	}
}(jQuery, window, document);