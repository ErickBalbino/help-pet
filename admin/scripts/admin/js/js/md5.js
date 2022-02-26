; (função (raiz, fábrica) {
	if (tipo de exportações === "objeto") {
		// CommonJS
		module.exports = exports = factory (require ("./ core"));
	}
	else if (typeof define === "function" && define.amd) {
		// AMD
		define (["./ core"], fábrica);
	}
	outro {
		// Global (navegador)
		fábrica (root.CryptoJS);
	}
} (isto, função (CryptoJS) {

	(função (matemática) {
	    // Shortcuts
	    var C = CryptoJS;
	    var C_lib = C.lib;
	    var WordArray = C_lib.WordArray;
	    var Hasher = C_lib.Hasher;
	    var C_algo = C.algo;

	    // Tabela de constantes
	    var T = [];

	    // Compute constantes
	    (função () {
	        para (var i = 0; i <64; i ++) {
	            T [i] = (Math.abs (Math.sin (i + 1)) * 0x100000000) | 0;
	        }
	    } ());

	    / **
	     * Algoritmo de hash MD5.
	     * /
	    var MD5 = C_algo.MD5 = Hasher.extend ({
	        _doReset: function () {
	            this._hash = new WordArray.init ([
	                0x67452301, 0xefcdab89,
	                0x98badcfe, 0x10325476
	            ]);
	        },

	        _doProcessBlock: function (M, offset) {
	            // Trocar endian
	            para (var i = 0; i <16; i ++) {
	                // Shortcuts
	                var offset_i = offset + i;
	                var M_offset_i = M [offset_i];

	                M [offset_i] = (
	                    (((M_offset_i << 8) | (M_offset_i >>> 24)) & 0x00ff00ff) |
	                    (((M_offset_i << 24) | (M_offset_i >>> 8)) & 0xff00ff00)
	                );
	            }

	            // Shortcuts
	            var H = this._hash.words;

	            var M_offset_0 = M [deslocamento + 0];
	            var M_offset_1 = M [offset + 1];
	            var M_offset_2 = M [deslocamento + 2];
	            var M_offset_3 = M [deslocamento + 3];
	            var M_offset_4 = M [deslocamento + 4];
	            var M_offset_5 = M [deslocamento + 5];
	            var M_offset_6 = M [deslocamento + 6];
	            var M_offset_7 = M [deslocamento + 7];
	            var M_offset_8 = M [deslocamento + 8];
	            var M_offset_9 = M [deslocamento + 9];
	            var M_offset_10 = M [deslocamento + 10];
	            var M_offset_11 = M [deslocamento + 11];
	            var M_offset_12 = M [deslocamento + 12];
	            var M_offset_13 = M [deslocamento + 13];
	            var M_offset_14 = M [deslocamento + 14];
	            var M_offset_15 = M [deslocamento + 15];

	            // Working varialbes
	            var a = H [0];
	            var b = H [1];
	            var c = H [2];
	            var d = H [3];

	            // Computação
	            a = FF (a, b, c, d, M_offset_0, 7, T [0]);
	            d = FF (d, a, b, c, M_offset_1, 12, T [1]);
	            c = FF (c, d, a, b, M_offset_2, 17, T [2]);
	            b = FF (b, c, d, a, M_desvio_3, 22, T [3]);
	            a = FF (a, b, c, d, M_offset_4, 7, T [4]);
	            d = FF (d, a, b, c, M_desvio_5, 12, T [5]);
	            c = FF (c, d, a, b, M_offset_6, 17, T [6]);
	            b = FF (b, c, d, a, M_offset_7, 22, T [7]);
	            a = FF (a, b, c, d, M_offset_8, 7, T [8]);
	            d = FF (d, a, b, c, M_offset_9, 12, T [9]);
	            c = FF (c, d, a, b, M_offset_10, 17, T [10]);
	            b = FF (b, c, d, a, M_offset_11, 22, T [11]);
	            a = FF (a, b, c, d, M_offset_12, 7, T [12]);
	            d = FF (d, a, b, c, M_offset_13, 12, T [13]);
	            c = FF (c, d, a, b, M_offset_14, 17, T [14]);
	            b = FF (b, c, d, a, M_offset_15, 22, T [15]);

	            a = GG (a, b, c, d, M_offset_1, 5, T [16]);
	            d = GG (d, a, b, c, M_offset_6, 9, T [17]);
	            c = GG (c, d, a, b, M_offset_11, 14, T [18]);
	            b = GG (b, c, d, a, M_offset_0, 20, T [19]);
	            a = GG (a, b, c, d, M_offset_5, 5, T [20]);
	            d = GG (d, a, b, c, M_offset_10, 9, T [21]);
	            c = GG (c, d, a, b, M_offset_15, 14, T [22]);
	            b = GG (b, c, d, a, M_offset_4, 20, T [23]);
	            a = GG (a, b, c, d, M_offset_9, 5, T [24]);
	            d = GG (d, a, b, c, M_offset_14, 9, T [25]);
	            c = GG (c, d, a, b, M_offset_3, 14, T [26]);
	            b = GG (b, c, d, a, M_offset_8, 20, T [27]);
	            a = GG (a, b, c, d, M_offset_13, 5, T [28]);
	            d = GG (d, a, b, c, M_offset_2, 9, T [29]);
	            c = GG (c, d, a, b, M_desvio_7, 14, T [30]);
	            b = GG (b, c, d, a, M_offset_12, 20, T [31]);

	            a = HH (a, b, c, d, M_desvio_5, 4, T [32]);
	            d = HH (d, a, b, c, M_desvio_8, 11, T [33]);
	            c = HH (c, d, a, b, M_offset_11, 16, T [34]);
	            b = HH (b, c, d, a, M_offset_14, 23, T [35]);
	            a = HH (a, b, c, d, M_offset_1, 4, T [36]);
	            d = HH (d, a, b, c, M_desvio_4, 11, T [37]);
	            c = HH (c, d, a, b, M_deslocamento_7, 16, T [38]);
	            b = HH (b, c, d, a, M_offset_10, 23, T [39]);
	            a = HH (a, b, c, d, M_desvio_13, 4, T [40]);
	            d = HH (d, a, b, c, M_offset_0, 11, T [41]);
	            c = HH (c, d, a, b, M_desvio_3, 16, T [42]);
	            b = HH (b, c, d, a, M_offset_6, 23, T [43]);
	            a = HH (a, b, c, d, M_offset_9, 4, T [44]);
	            d = HH (d, a, b, c, M_offset_12, 11, T [45]);
	            c = HH (c, d, a, b, M_desvio_15, 16, T [46]);
	            b = HH (b, c, d, a, M_offset_2, 23, T [47]);

	            a = II (a, b, c, d, M_desvio_0, 6, T [48]);
	            d = II (d, a, b, c, M_desvio_7, 10, T [49]);
	            c = II (c, d, a, b, M_offset_14, 15, T [50]);
	            b = II (b, c, d, a, M_desvio_5, 21, T [51]);
	            a = II (a, b, c, d, M_offset_12, 6, T [52]);
	            d = II (d, a, b, c, M_desvio_3, 10, T [53]);
	            c = II (c, d, a, b, M_desvio_10, 15, T [54]);
	            b = II (b, c, d, a, M_offset_1, 21, T [55]);
	            a = II (a, b, c, d, M_offset_8, 6, T [56]);
	            d = II (d, a, b, c, M_desvio_15, 10, T [57]);
	            c = II (c, d, a, b, M_desvio_6, 15, T [58]);
	            b = II (b, c, d, a, M_desvio_13, 21, T [59]);
	            a = II (a, b, c, d, M_desvio_4, 6, T [60]);
	            d = II (d, a, b, c, M_offset_11, 10, T [61]);
	            c = II (c, d, a, b, M_desvio_2, 15, T [62]);
	            b = II (b, c, d, a, M_desvio_9, 21, T [63]);

	            // Valor de hash intermediário
	            H [0] = (H [0] + a) | 0;
	            H [1] = (H [1] + b) | 0;
	            H [2] = (H [2] + c) | 0;
	            H [3] = (H [3] + d) | 0;
	        },

	        _doFinalize: function () {
	            // Shortcuts
	            var data = this._data;
	            var dataWords = data.words;

	            var nBitsTotal = this._nDataBytes * 8;
	            var nBitsLeft = data.sigBytes * 8;

	            // Adicionar preenchimento
	            dataWords [nBitsLeft >>> 5] | = 0x80 << (24 - nBitsLeft% 32);

	            var nBitsTotalH = Math.floor (nBitsTotal / 0x100000000);
	            var nBitsTotalL = nBitsTotal;
	            dataWords [(((nBitsLeft + 64) >>> 9) << 4) + 15] = (
	                (((nBitsTotalH << 8) | (nBitsTotalH >>> 24)) & 0x00ff00ff) |
	                (((nBitsTotalH << 24) | (nBitsTotalH >>> 8)) & 0xff00ff00)
	            );
	            dataWords [(((nBitsLeft + 64) >>> 9) << 4) + 14] = (
	                (((nBitsTotalL << 8) | (nBitsTotalL >>> 24)) & 0x00ff00ff) |
	                (((nBitsTotalL << 24) | (nBitsTotalL >>> 8)) & 0xff00ff00)
	            );

	            data.sigBytes = (dataWords.length + 1) * 4;

	            // Blocos finais de hash
	            Este processo();

	            // Shortcuts
	            var hash = this._hash;
	            var H = hash.words;

	            // Trocar endian
	            para (var i = 0; i <4; i ++) {
	                // Shortcut
	                var H_i = H [i];

	                H [i] = (((H_i << 8) | (H_i >>> 24)) & 0x00ff00ff) |
	                       (((H_i << 24) | (H_i >>> 8)) & 0xff00ff00);
	            }

	            // Retorna o hash computado final
	            return hash;
	        },

	        clone: ​​function () {
	            var clone = Hasher.clone.call (this);
	            clone._hash = this._hash.clone ();

	            retornar clone;
	        }
	    });

	    função FF (a, b, c, d, x, s, t) {
	        var n = a + ((b & c) | (~ b & d)) + x + t;
	        return ((n << s) | (n >>> (32 - s))) + b;
	    }

	    função GG (a, b, c, d, x, s, t) {
	        var n = a + ((b & d) | (c & ~ d)) + x + t;
	        return ((n << s) | (n >>> (32 - s))) + b;
	    }

	    função HH (a, b, c, d, x, s, t) {
	        var n = a + (b ^ c ^ d) + x + t;
	        return ((n << s) | (n >>> (32 - s))) + b;
	    }

	    função II (a, b, c, d, x, s, t) {
	        var n = a + (c ^ (b | ~ d)) + x + t;
	        return ((n << s) | (n >>> (32 - s))) + b;
	    }

	    / **
	     * Função de atalho para a interface do objeto do hasher.
	     *
	     * @param {WordArray | string} message A mensagem para hash.
	     *
	     * @return {WordArray} O hash.
	     *
	     * @static
	     *
	     * @exemplo
	     *
	     * var hash = CryptoJS.MD5 ('mensagem');
	     * var hash = CryptoJS.MD5 (wordArray);
	     * /
	    C.MD5 = Hasher._createHelper (MD5);

	    / **
	     * Função de atalho para a interface de objetos do HMAC.
	     *
	     * @param {WordArray | string} message A mensagem para hash.
	     * @param {WordArray | string} key A chave secreta.
	     *
	     * @return {WordArray} O HMAC.
	     *
	     * @static
	     *
	     * @exemplo
	     *
	     * var hmac = CryptoJS.HmacMD5 (mensagem, chave);
	     * /
	    C.HmacMD5 = Hasher._createHmacHelper (MD5);
	}(Matemática));


	return CryptoJS.MD5;

}));