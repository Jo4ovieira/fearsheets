function statsTotal() {
    var cl = document.getElementById('class').value
    var nex = document.getElementById('nex').value
    var int = document.getElementById('intelligence').value
    var pre = document.getElementById('presence').value
    var vig = document.getElementById('vigor').value
    // Combatant
    if(cl == 2) {
        total = 20 + parseInt(vig)
        totalPerNex = 4 + parseInt(vig)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('life').value = totalps
        } else {
            document.getElementById('life').value = total
        }
        document.getElementById('lpNex').textContent = totalPerNex
    }
    // Specialist
    if(cl == 3) {
        total = 16 + parseInt(vig)
        totalPerNex = 3 + parseInt(vig)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('life').value = totalps
        } else {
            document.getElementById('life').value = total
        }
        document.getElementById('lpNex').textContent = totalPerNex
    }
    // Occultist
    if(cl == 4) {
        total = 12 + parseInt(vig)
        totalPerNex = 2 + parseInt(vig)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('life').value = totalps
        } else {
            document.getElementById('life').value = total
        }
        document.getElementById('lpNex').textContent = totalPerNex
    }

    //Sanity

    // Combatant
    if(cl == 2) {
        total = 12
        totalPerNex = 3
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('san').value = totalps
        } else {
            document.getElementById('san').value = total
        }
        document.getElementById('sanNex').textContent = totalPerNex
    }
    // Specialist
    if(cl == 3) {
        total = 16
        totalPerNex = 4
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('san').value = totalps
        } else {
            document.getElementById('san').value = total
        }
        document.getElementById('sanNex').textContent = totalPerNex
    }
    // Occultist
    if(cl == 4) {
        total = 20
        totalPerNex = 5
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('san').value = totalps
        } else {
            document.getElementById('san').value = total
        }
        document.getElementById('sanNex').textContent = totalPerNex
    }

    //Effort

    // Combatant
    if(cl == 2) {
        total = 2 + parseInt(pre)
        totalPerNex = 2 + parseInt(pre)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('effort').value = totalps
        } else {
            document.getElementById('effort').value = total
        }
        document.getElementById('effNex').textContent = totalPerNex
    }
    // Specialist
    if(cl == 3) {
        total = 3 + parseInt(pre)
        totalPerNex = 3 + parseInt(pre)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('effort').value = totalps
        } else {
            document.getElementById('effort').value = total
        }
        document.getElementById('effNex').textContent = totalPerNex
    }
    // Occultist
    if(cl == 4) {
        total = 4 + parseInt(pre)
        totalPerNex = 4 + parseInt(pre)
        if(nex > 1) {
            realnex = parseInt(nex) - 1
            extraLifeNex = totalPerNex * realnex
            totalps = total + extraLifeNex
            document.getElementById('effort').value = totalps
        } else {
            document.getElementById('effort').value = total
        }
        document.getElementById('effNex').textContent = totalPerNex
    }

    // Proficiencies

    // Combatant
    if(cl == 1) {
        document.getElementById('prof').textContent = "Simple weapons, Tactical weapons and light protections"
    }
    // Specialist
    if(cl == 2) {
        document.getElementById('prof').textContent = "Simple weapons and light protections"
    }
    // Occultist
    if(cl == 3) {
        document.getElementById('prof').textContent = "Simple weapons"
    }

    // Proficiencies

    // Combatant
    if(cl == 2) {
        tps = 1 + parseInt(int)
        document.getElementById('expertisePoints').textContent = tps
        document.getElementById('expertiseObligated').textContent = ", and chose to be trained either in Fight or Aim and between Fortitude or reflex"
    }
    // Specialist
    if(cl == 3) {
        tps = 7 + parseInt(int)
        document.getElementById('expertisePoints').textContent = tps
    }
    // Occultist
    if(cl == 4) {
        tps = 3 + parseInt(int)
        document.getElementById('expertisePoints').textContent = tps
        document.getElementById('expertiseObligated').textContent = ", and you must have Occultism and Will"
    }
}

function baseDefense() {
    var agi = document.getElementById('agility').value
    var prot = document.getElementById('prot').value
    if(prot == 0) {
        var armor = 0
    } else if(prot == 1) {
        var armor = 5
    } else if(prot == 2) {
        var armor = 10
    }
    totalDef = 10 + parseInt(agi) + armor
    document.getElementById('baseDef').value = totalDef
    document.getElementById('defAgi').textContent = agi
    document.getElementById('pt').textContent = armor
}

function expertisePoints() {
    let expList = [
        'Acrobatics','Taming','Arts','Athletics','Knowledge','Science','Thievery','Diplomacy','Bluff','Fortitude','Stealth','Initiative','Intimidation','Intuition','Investigation','Fight','Medicine','Occultism','Perception','Piloting','Aim','Profession','Reflex','Religion','Survival','Tactic','Technology','Will'
    ]
    expList.forEach(item => {
        var exp = document.getElementById(item).value
        if(exp == 0) {
            var pts = 0
        } else if(exp == 1) {
            var pts = 5
        } else if(exp == 2) {
            var pts = 10
        } else if(exp == 3) {
            var pts = 15
        }
        var safe = item + "T"
        document.getElementById(safe).textContent = pts
    })
}

function D20agi() {
    var agi = document.getElementById('agility').value

    for(var i = 0; i < 7 ; i++) {
        document.getElementsByClassName('attr-1')[i].textContent = agi
    }
}

function D20str() {
    var str = document.getElementById('strength').value

    for(var i = 0; i < 2 ; i++) {
        document.getElementsByClassName('attr-2')[i].textContent = str
    }
}

function D20int() {
    var int = document.getElementById('intelligence').value

    for(var i = 0; i < 10 ; i++) {
        document.getElementsByClassName('attr-3')[i].textContent = int
    }
}

function D20pre() {
    var pre = document.getElementById('presence').value

    for(var i = 0; i < 8 ; i++) {
        document.getElementsByClassName('attr-4')[i].textContent = pre
    }
}

function D20vig() {
    var vig = document.getElementById('vigor').value

    for(var i = 0; ; i++) {
        document.getElementsByClassName('attr-5')[i].textContent = vig
    }
}

window.onload = function exptsPatentAndWgt() {
    baseDefense()

    D20agi()
    D20str()
    D20int()
    D20pre()
    D20vig()

    let expList = [
        'Acrobatics','Taming','Arts','Athletics','Knowledge','Science','Thievery','Diplomacy','Bluff','Fortitude','Stealth','Initiative','Intimidation','Intuition','Investigation','Fight','Medicine','Occultism','Perception','Piloting','Aim','Profession','Reflex','Religion','Survival','Tactic','Technology','Will'
    ]
    expList.forEach(item => {
        var exp = document.getElementById(item).value
        if(exp == 0) {
            var pts = 0
        } else if(exp == 1) {
            var pts = 5
        } else if(exp == 2) {
            var pts = 10
        } else if(exp == 3) {
            var pts = 15
        }
        var safe = item + "T"
        document.getElementById(safe).textContent = pts
    })

    var patent = document.getElementById('patent').value
    var cat1 = document.getElementById('cat1')
    var cat2 = document.getElementById('cat2')
    var cat3 = document.getElementById('cat3')
    var cat4 = document.getElementById('cat4')
    var cred = document.getElementById('credLim')
    var str = document.getElementById('strength').value
    var whtLim = document.getElementById('wgtLim')

    // Patent

    if(patent == 0) {
        cat1.value = 2
        cat2.value = 0
        cat3.value = 0
        cat4.value = 0
        cred.value = "Low"
    }
    if(patent == 1) {
        cat1.value = 3
        cat2.value = 1
        cat3.value = 0
        cat4.value = 0
        cred.value = "Average"
    }
    if(patent == 2) {
        cat1.value = 3
        cat2.value = 2
        cat3.value = 1
        cat4.value = 0
        cred.value = "Average"
    }
    if(patent == 3) {
        cat1.value = 3
        cat2.value = 3
        cat3.value = 2
        cat4.value = 1
        cred.value = "High"
    }
    if(patent == 4) {
        cat1.value = 3
        cat2.value = 3
        cat3.value = 3
        cat4.value = 2
        cred.value = "Unlimited"
    }

    // Weight

    if(str >= 1){
        var weight = parseInt(str) * 5
        whtLim.value = weight
    } else {
        whtLim.value = 2
    }
}
function addAtack() {
    var i_weapon = document.createElement('input');
    var i_test = document.createElement('input');
    var i_damage = document.createElement('input');
    var i_special = document.createElement('input');
    var i_id_atk = document.createElement('input');

    var d_weapon = document.createElement('div');
    var d_test = document.createElement('div');
    var d_damage = document.createElement('div');
    var d_especial = document.createElement('div');

    i_weapon.setAttribute("type", "text");
    i_weapon.setAttribute("class", "input_atk");
    i_weapon.setAttribute("name", "weapon[]");
    i_weapon.setAttribute("placeholder", "Weapon");
    i_test.setAttribute("type", "text");
    i_test.setAttribute("class", "input_atk");
    i_test.setAttribute("name", "test[]");
    i_test.setAttribute("placeholder", "Test");
    i_damage.setAttribute("type", "text");
    i_damage.setAttribute("class", "input_atk");
    i_damage.setAttribute("name", "damage[]");
    i_damage.setAttribute("placeholder", "Damage");
    i_special.setAttribute("type", "text");
    i_special.setAttribute("class", "input_atk");
    i_special.setAttribute("name", "special[]");
    i_special.setAttribute("placeholder", "Special");
    i_id_atk.setAttribute("type", "text");
    i_id_atk.setAttribute("name", "id_atk[]");
    i_id_atk.setAttribute("value", "add");
    i_id_atk.hidden = true;

    d_weapon.setAttribute("class", "col-xs-3 col-lg-3 col-md-3 col-sm-4 col-4");
    d_test.setAttribute("class", "col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4");
    d_damage.setAttribute("class", "col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4");
    d_especial.setAttribute("class", "col-xs-5 col-lg-5 col-md-5 col-sm-12 col-12");

    d_weapon.appendChild(i_weapon)
    d_test.appendChild(i_test)
    d_damage.appendChild(i_damage)
    d_especial.appendChild(i_special)
    d_especial.appendChild(i_id_atk)

    document.getElementById('attackDiv').appendChild(d_weapon);
    document.getElementById('attackDiv').appendChild(d_test);
    document.getElementById('attackDiv').appendChild(d_damage);
    document.getElementById('attackDiv').appendChild(d_especial);
  }

function addRitual() {
    var i_name = document.createElement('input');
    var i_cost = document.createElement('input');
    var i_page = document.createElement('input');
    var i_description = document.createElement('input');
    var i_id_rit = document.createElement('input');

    var d_name = document.createElement('div');
    var d_cost = document.createElement('div');
    var d_page = document.createElement('div');
    var d_description = document.createElement('div');

    i_name.setAttribute("type", "text");
    i_name.setAttribute("class", "input_atk");
    i_name.setAttribute("name", "skill_name[]");
    i_name.setAttribute("placeholder", "Name");
    i_cost.setAttribute("type", "text");
    i_cost.setAttribute("class", "input_atk");
    i_cost.setAttribute("name", "cost[]");
    i_cost.setAttribute("placeholder", "Cost");
    i_page.setAttribute("type", "text");
    i_page.setAttribute("class", "input_atk");
    i_page.setAttribute("name", "page[]");
    i_page.setAttribute("placeholder", "Page");
    i_description.setAttribute("type", "text");
    i_description.setAttribute("class", "input_atk");
    i_description.setAttribute("name", "description[]");
    i_description.setAttribute("placeholder", "Description");
    i_id_rit.setAttribute("type", "text");
    i_id_rit.setAttribute("name", "id_sr[]");
    i_id_rit.setAttribute("value", "add");
    i_id_rit.hidden = true;

    d_name.setAttribute("class", "col-xs-3 col-lg-3 col-md-3 col-sm-6 col-6");
    d_cost.setAttribute("class", "col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3");
    d_page.setAttribute("class", "col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3");
    d_description.setAttribute("class", "col-xs-5 col-lg-5 col-md-5 col-sm-12 col-12");

    d_name.appendChild(i_name)
    d_cost.appendChild(i_cost)
    d_page.appendChild(i_page)
    d_description.appendChild(i_description)
    d_description.appendChild(i_id_rit)

    document.getElementById('skillsDiv').appendChild(d_name);
    document.getElementById('skillsDiv').appendChild(d_cost);
    document.getElementById('skillsDiv').appendChild(d_page);
    document.getElementById('skillsDiv').appendChild(d_description);
  }

function addItem() {
    var i_item = document.createElement('input');
    var i_category = document.createElement('input');
    var i_weight = document.createElement('input');
    var i_id_inv = document.createElement('input');

    var d_item = document.createElement('div');
    var d_category = document.createElement('div');
    var d_weight = document.createElement('div');

    i_item.setAttribute("type", "text");
    i_item.setAttribute("class", "input_atk");
    i_item.setAttribute("name", "item[]");
    i_item.setAttribute("placeholder", "Item");
    i_category.setAttribute("type", "text");
    i_category.setAttribute("class", "input_atk");
    i_category.setAttribute("name", "category[]");
    i_category.setAttribute("placeholder", "Category");
    i_weight.setAttribute("type", "text");
    i_weight.setAttribute("class", "input_atk");
    i_weight.setAttribute("name", "weight[]");
    i_weight.setAttribute("placeholder", "Weight");
    i_id_inv.setAttribute("type", "text");
    i_id_inv.setAttribute("name", "id_inv[]");
    i_id_inv.setAttribute("value", "add");
    i_id_inv.hidden = true;

    d_item.setAttribute("class", "col-xs-7 col-lg-7 col-md-7 col-sm-12 col-12");
    d_category.setAttribute("class", "col-xs-2 col-lg-2 col-md-2 col-sm-6 col-6");
    d_weight.setAttribute("class", "col-xs-3 col-lg-3 col-md-3 col-sm-6 col-6");

    d_item.appendChild(i_item)
    d_category.appendChild(i_category)
    d_weight.appendChild(i_weight)
    d_weight.appendChild(i_id_inv)

    document.getElementById('itemsDiv').appendChild(d_item);
    document.getElementById('itemsDiv').appendChild(d_category);
    document.getElementById('itemsDiv').appendChild(d_weight);
}

  function patentChange() {
    var patent = document.getElementById('patent').value
    var cat1 = document.getElementById('cat1')
    var cat2 = document.getElementById('cat2')
    var cat3 = document.getElementById('cat3')
    var cat4 = document.getElementById('cat4')
    var cred = document.getElementById('credLim')
    var str = document.getElementById('strength').value
    var whtLim = document.getElementById('wgtLim')

    // Patent

    if(patent == 0) {
        cat1.value = 2
        cat2.value = 0
        cat3.value = 0
        cat4.value = 0
        cred.value = "Low"
    }
    if(patent == 1) {
        cat1.value = 3
        cat2.value = 1
        cat3.value = 0
        cat4.value = 0
        cred.value = "Average"
    }
    if(patent == 2) {
        cat1.value = 3
        cat2.value = 2
        cat3.value = 1
        cat4.value = 0
        cred.value = "Average"
    }
    if(patent == 3) {
        cat1.value = 3
        cat2.value = 3
        cat3.value = 2
        cat4.value = 1
        cred.value = "High"
    }
    if(patent == 4) {
        cat1.value = 3
        cat2.value = 3
        cat3.value = 3
        cat4.value = 2
        cred.value = "Unlimited"
    }
  }
  function editAgent(id) {
    window.location.href = "agents/edit/" + id
  }





