//base test functions

function forEach(iterable, fn, bind){
	for (var i = 0, j = iterable.length; i < j; i++) fn.call(bind, iterable[i], i, iterable);
};

//test start

window.onload = function(){
		var counter_row=1;//Giz for measuring rows counted
		var counter_column=0;//Giz for measuring rows counted
		document.getElementById("myForm").style.display = 'none';
	var frameworks = {};
	
	forEach(document.getElementsByTagName('iframe'), function(iframe){
		frameworks[iframe.name] = {
			'test': window.frames[iframe.name].test,
			'selectors': []
		};
	});
	
	var tbody = document.getElementById('tbody');
	var tfoot = document.getElementById('tfoot');
	var lastrow = tfoot.getElementsByTagName('tr')[0];
	
	var controls = document.getElementById('controls');
	
	var links = controls.getElementsByTagName('a');
	
	var start = links[1];
	var stop = links[0];
	
	start.onclick = function(){
		testRunner();
		return false;
	};
	
	stop.onclick = function(){
		clearTimeout(timer);
		timer = null;
		alert("Test is stopped!");
		document.getElementById("device").focus();
		return false;
	};
	
	var score = [];
	var scores = {};
	
	var frxi = 0;
	for (var name in frameworks){
		var framework = frameworks[name];
		forEach(window.selectors, function(selector){
			framework.selectors.push(selector);
		});
		scores[name] = lastrow.getElementsByTagName('td')[frxi];
		score[name] = 0;
		frxi++;
	}
	
	var tests = [];

	forEach(window.selectors, function(selector, i){
		var frxi = 0;
		var row = tbody.getElementsByTagName('tr')[i];
		for (var name in frameworks){
			var framework = frameworks[name];
			var cell = row.getElementsByTagName('td')[frxi];
			tests.push({
				'execute': framework.test,
				'selector': framework.selectors[i],
				'name': name,
				'row': row,
				'cell' : cell
			});
			frxi++;
			
		}
	});
	
	var timer = null;
	
	var testRunner = function(){
		var test = tests.shift();
		if (!test) return;
		var results = test.execute(test.selector);
		test.cell.className = 'test';
		//test.cell.innerHTML = results.time + ' ms | ' + results.found + ' found';
		//test.cell.innerHTML = '<span class="all">'+results.times + '=</span><span class="tot">' + results.time + '</span><span class="found">| ' + results.found + ' found</span>';  // sot
		test.cell.innerHTML = '<span class="tot">' + results.time + '</span><span class="found">| ' + results.found + ' found</span>';  // sot
		test.cell.speed = results.time;
		if (results.error){
			test.cell.innerHTML = results.time + ' ms | <span class="exception" title="' + results.error + '">error returned</a>';
			test.cell.className += ' exception';
			test.cell.found = 0;
			test.cell.error = true;
		} else {
			test.cell.found = results.found;
			test.cell.error = false;
		}
		
		score[test.name] += test.cell.speed;
		scores[test.name].innerHTML =  '&nbsp;' + score[test.name] + '&nbsp;';
		
		if (test.cell == test.row.lastChild) colourRow(test.row);
		timer = setTimeout(testRunner, 50);  //sot
	};
	
	var colourRow = function(row){
		
		var cells = [];
		
		var tds = row.getElementsByTagName('td');
		forEach(tds, function(td){
			cells.push(td);
		});
		
		var speeds = [];

		forEach(cells, function(cell, i){
			if (!cell.error) speeds[i] = cell.speed;
			//error, so we exclude it from colouring good. does not affect score (it should?).
			else speeds[i] = 99999999999999999999999;
			counter_column++;
			console.log(counter_row);
			if (counter_column==cells.length)
			counter_row++;
		});
		
		var min = Math.min.apply(this, speeds);
		var max = Math.max.apply(this, speeds);
		if (counter_column==cells.length && counter_row==window.selectors.length){
			setTimeout(function(){alert("Test is finished!");
			document.getElementById("myForm").style.display = 'block';
			document.getElementById("device").focus();},1000);
		}
		var found = [];
		var mismatch = false;
		forEach(cells, function(cell, i){
			found.push(cell.found);
			if (!mismatch){
				forEach(found, function(n){
					if (!cell.error && cell.found != undefined && n && cell.found != n){
						mismatch = true;
						return;
					}
				});
			}
			if (cell.speed == min) cell.className += ' good';
			else if (cell.speed == max) cell.className += ' bad';
			else cell.className += ' normal';
		});
		
		if (mismatch){
			forEach(cells, function(cell, i){
				if (cell.found != undefined) cell.className += ' mismatch';
			});
		}
		
	};
	

};


      function sendResults() {
		siskevi = getElementById("siskevi");
		os = getElementById("os");
		br = getElementById("br");
		if (siskevi=="" || siskevi==null) {
			alert("Simplirwse ti syskevi");
			siskevi.focus();
			return false;
		}
		if (os=="" || os==null) {
			alert("Simplirwse to leitoyrgiko");
			os.focus();
			return false;
		}
		if (br=="" || br==null) {
			alert("Simplirwse ton browser");
			br.focus();
			return false;
		}

		getElementById("device").value=navigator.userAgent;
		getElementById("results").value=getElementById("results").innerHTML;
	    return true;
	  }

