// JavaScript Document

let field = document.querySelector('.items');
let li = Array.from(field.children);


function SortProduct() {
	let select = document.getElementById('select');
	let ar = [];
	for(let i of li){
		const last = i.lastElementChild;
		const x = last.textContent.trim();
		const y = Number(x.substring(2));
		i.setAttribute("data-price", y);
		ar.push(i);
	}
	this.run = ()=>{
		addevent();
	}
	function addevent(){
		select.onchange = sortingValue;
	}
	function sortingValue(){
	
		if (this.value === 'default') {
			while (field.firstChild) {field.removeChild(field.firstChild);}
			field.append(...ar);	
		}
		if (this.value === 'HighToLow') {
			SortElem(field, li, true);
		}
		if (this.value === 'LowToHigh') {
			SortElem(field, li, false);
		}
	}
	function SortElem(field,li, asc){
		let  dm, sortli;
		dm = asc ? 1 : -1;
		sortli = li.sort((a, b)=>{
			const ax = parseFloat(a.getAttribute('data-price')).valueOf();
			const bx = parseFloat(b.getAttribute('data-price')).valueOf();
			return bx > ax ? (1*dm) : (-1*dm);
		});
		 while (field.firstChild) {field.removeChild(field.firstChild);}
		 field.append(...sortli);	
	}
}


new SortProduct().run();