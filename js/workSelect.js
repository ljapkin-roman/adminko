function removeOptions(selectbox)
	{
		var i;
		for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
		{
			selectbox.remove(i);
		}
	}

	function createArea(data) {
		let area = document.getElementById('area');
		removeOptions(area);
		
		area.options[area.options.length] = new Option("Выберите район", "");
		for(let k in data) {
			area.options[area.options.length] = new Option(  data[k], data[k]);
		}
	}

	
	function createTown(data) {
		let town = document.getElementById('town');
		removeOptions(town);
		town.options[town.options.length] = new Option("Выберите населеный пункт","");
		for(let k in data) {
			town.options[town.options.length] = new Option(  data[k], data[k]);
		}
	}

	function changeTown(str) {
		area = str.options[str.selectedIndex].innerHTML;
		let district = document.getElementById('district');
		district = district.options[district.selectedIndex].innerHTML;
		let baseUrl = "http://localhost:80/getdata?dist=" + district + "&area=" + area;
		async function getTownOfArea(baseUrl) {
			let response = await fetch(baseUrl);
			let json = await response.json();
			createTown(json.town);
		}
		let start = getTownOfArea(baseUrl);
	}

	function selectDistrict(str) {
		name_distr = str.options[str.selectedIndex].innerHTML;
    if (name_distr == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
		let baseUrl = "http://localhost:80/district/getdata/" + name_distr + " область";
		async function getDistrict(baseUrl) {
			let response = await fetch(baseUrl);
			let json = await response.json();
            console.log(json);
			createArea(json.area);
			createTown(json.town);
		}
		let start = getDistrict(baseUrl);
    }
}
