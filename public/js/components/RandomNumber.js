class RandomNumber extends React.Component {
    constructor(props) {
        super(props);
        this.state = {error:null,random:0, min: 0,max:1000 };
    }

    updateMin(el) {
        this.setState({min:el.target.value,error:null});
    }
    updateMax(el) {
        this.setState({max:el.target.value,error:null});
    }

    displayError() {
        if(this.state.error) {
            return <div className="callout">{this.state.error}</div>;
        }
    }


  getRandomInt() {

    //let min = Math.ceil(this.state.min);
    //let max = Math.floor(this.state.max);
    //let random =  Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive
    let requestData = {min:this.state.min,max:this.state.max};
    const request = fetch('/number/random', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json;charset=utf-8'
  },
  body: JSON.stringify(requestData)
}).then(function(resp) {return resp.json()}).then(function(data) {
        this.setState({random:data.randomNumber,min:data.min,max:data.max});
    }.bind(this));
}

  render() {

    return(
    <div>
    {this.displayError()}
    <h2>{this.state.random}</h2>
    <hr/>
    <div className="row">
            <div className="columns small-12 medium-6">
                <div className="input-group">
                    <label>Min</label>
                    <input type="number" onChange={this.updateMin.bind(this)} name="min" id="min" value={this.state.min} />
                </div>
            </div>
            <div className="columns small-12 medium-6">
                <div className="input-group">
                    <label>Max</label>
                    <input type="number" onChange={this.updateMax.bind(this)} name="max" id="max" value={this.state.max} />
                </div>
            </div>
        </div>
        <button className="button" type="submit" onClick={this.getRandomInt.bind(this)}>Get</button>
        </div>);

  }
}
