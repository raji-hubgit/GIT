var CalculatorViewModel = function() {
  
    this.calculatorDisplay = ko.observable(""); 
    
    this.updateCalculatorDisplay = function(value) {
      this.calculatorDisplay(this.calculatorDisplay()+value); 
    }; 
    this.clearDisplay = function() {
      this.calculatorDisplay(""); 
    }
    
    this.backspace = function() {
      if (this.calculatorDisplay().length) {
        this.calculatorDisplay(this.calculatorDisplay().substring(0,this.calculatorDisplay().length-1)); 
      }
    }
    
    this.evaluateDisplay = function() {
      
        this.calculatorDisplay(eval(this.calculatorDisplay()).toString());      
    } 
  }
  ko.applyBindings(new CalculatorViewModel()); 
  