class BitcoinChartTable extends React.Component {
    constructor(props) {
        super(props);
        this.state = {loading:false,isLoaded:false,data:null,lastUpdate:Date.now()};
    }
    componentDidMount() {
        this.loadData();

        setInterval(this.loadData.bind(this),10000);
    }

    loadData() {
        this.setState({loading:true});
        fetch('https://blockchain.info/ticker').then(
            function(res) {
                return res.json();
            }
        ).then(function(data) {
            this.setState({loading:false,isLoaded:true,data:data});
        }.bind(this)).catch(function(error) {
            alert(error);
        });
    }

    render() {
        const { loading,isLoaded,data } = this.state;
        let output = null;
        let loadingState = 'The table is updated every 10 seconds. No need to reload manully.';
        if(isLoaded) {
            //console.log(data);
            output = Object.entries(data).map(function(item,i) {
              return(<BitcoinChartTableRow item={item}  key={i}></BitcoinChartTableRow>)
            })
        }
        if(loading) {
            loadingState='Updating data...';
        }

        return(
            <div>
            <div className="callout success">{loadingState}</div>

 <table className="table">
        <thead>
            <tr>
                <th>Currency</th>
                <th>Buy</th>
                <th>Sell</th>
            </tr>
        </thead>
        <tbody>
            {output}
        </tbody>
    </table>

            </div>
        );
    }
}

class BitcoinChartTableRow extends React.Component {
    constructor(props) {
        super(props);
       console.log(this.props.item);
    }
    render() {
        const {item} = this.props;
        return(
        <tr>
            <td>{item[0]} | {item[1].symbol}</td>
            <td>{item[1].buy}</td>
            <td>{item[1].sell}</td>
        </tr>);
    }
}
