'use strict';

function getCSSRule(ruleName, deleteFlag) {
    ruleName = ruleName.toLowerCase();
    for (var i = 0; i < document.styleSheets.length; i++) {
        var styleSheet = document.styleSheets[i];
        var ii = 0;
        var cssRule = false;
        do {
            cssRule = styleSheet.cssRules[ii];
            if (cssRule) {
                if (cssRule.selectorText.toLowerCase() == ruleName) {
                    if (deleteFlag == 'delete') {
                        styleSheet.deleteRule(ii);
                        return true; //
                    } else {
                        return cssRule;
                    }
                }
            }
            ii++;
        } while (cssRule);
    }
    return false;
}

function killCSSRule(ruleName) {
    return getCSSRule(ruleName, 'delete');
}

function addCSSRule(ruleName) {
    if (!getCSSRule(ruleName)) { // if rule doesn't exist...
        document.styleSheets[0].insertRule(ruleName + ' { }', 0);
    }
    return getCSSRule(ruleName);
}

function addCSSPropTo(ruleName, propertyName, property) {
    //Syntax: addCSSPropTo('h2', 'font-size', '4em'); 
    var rule = getCSSRule(ruleName);
    rule.style[propertyName] = property;
}


var rule = {
    //full names 
    getRule: getCSSRule,
    addRule: addCSSRule,
    killRule: killCSSRule,
    //short names 
    get: getCSSRule,
    add: addCSSRule,
    kill: killCSSRule,
    remove: killCSSRule,
    prop: addCSSPropTo
};