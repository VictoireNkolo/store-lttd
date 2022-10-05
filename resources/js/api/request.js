export default {

	postCall(url, data) {
		return new Promise( (resolve, reject) => {
			let loader 	=	document.querySelector('.lds-ring');
			loader.style.display = 'inline-block'
			axios.post(url, data)
				.then( (res) => {
					loader.style.display = 'none'
					resolve(res);
				} )
				.catch ( (err) => {
					loader.style.display = 'none'
					reject(err);
				} )
		} );
	},

	getCall(url, params) {
		return new Promise( (resolve, reject) => {

			let loader 	=	document.querySelector('.lds-ring');
			loader.style.display = 'inline-block';
			axios.get(url, {
				params: params
			})
				.then( (res) => {
					loader.style.display = 'none'
					resolve(res);
				} )
				.catch ( (err) => {
					loader.style.display = 'none'
					reject(err);
				} )
		} );
	},
	getCallSilence(url, params) {
		return new Promise( (resolve, reject) => {

		
			axios.get(url, {
				params: params
			})
				.then( (res) => {
					resolve(res);
				} )
				.catch ( (err) => {
					reject(err);
				} )
		} );
	},
	
}
