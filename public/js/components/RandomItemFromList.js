class RandomItemFromList extends React.Component {


    constructor(props) {
        super(props);
        this.state = {
            userInputList:"",
            separator:",",
            items:[],
            randomItem:null
            };
    }

    componentDidMount() {
        if(this.props.id != 0) {
            this.loadExistingList();
        }
    }

    loadExistingList() {
        fetch('/api/engine/list/'+this.props.id+'/get')
        .then((res)=>{
            return res.json();
        }).then((data)=>{
            this.setState({userInputList:data.original_input.trim(),separator:data.original_separator});
        });
    }


    randomizeData() {
        let requestData = {items:this.state.userInputList,separator:this.state.separator};

        fetch('/api/engine/list/random',{
            method:'post',
            headers:{
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(requestData)
        }).then((res)=>{
            return res.json();
        }).then((data)=>{
            this.setState({items:data.items,randomItem:data.randomItem});
        });
    }

    handleListChange(event) {
        this.setState({userInputList:event.target.value});
    }
    handleSeparatorChange(event) {
        this.setState({separator:event.target.value});
    }
    render() {
        let randomItem;
        let itemsListView;
        if(this.state.randomItem != null) {
            randomItem = <div className="cell">Random Item: <h2>{this.state.randomItem}</h2></div>
            itemsListView = this.state.items.map((item)=>{
                return <li>{item}</li>
            });
        }

        return (
            <React.Fragment>
                <div className="row">
                    <div className="small-12 medium-12 columns">
                        <div className="callout">
                           {randomItem}


                            <div className="cell">
                                <label htmlFor="items">
                                    Enter as many items as you want. Don't forget to seperate them by comma
                                </label>
                                <textarea placeholder="Coffee,Sandwich,Milk" value={this.state.userInputList} onChange={this.handleListChange.bind(this)} name="items" style={{resize: "vertical"}}></textarea>
                            </div>
                            <div className="cell medium-2">
                                <div className="input-group">
                                    <span className="input-group-label">Separator</span>
                                    <input type="text" name="separator" id="separator" className="input-group-field" value={this.state.separator} onChange={this.handleSeparatorChange.bind(this)} />
                                </div>
                            </div>
                            <button className="button" onClick={this.randomizeData.bind(this)}>Get Random</button>

                             <ul>
                            {itemsListView}
                            </ul>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        )
    }
}
