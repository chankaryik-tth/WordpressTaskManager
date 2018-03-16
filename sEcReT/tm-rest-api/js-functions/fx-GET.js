import React, {Component} from 'react';
import {
	AppRegistry,
	StyleSheet,
	ActivityIndicator,
	Text,
	View,
	ListView
}from 'react-native';

export default class FetchWpTasks extends Component{

	constructor(props){
		super(props);
		this.state = {
			isLoading: true,
			cloneTask: [],
			taskPage: '',
      		taskId: ''
		}
		
	}

	componentDidMount(){
	    const{taskId} = this.state;
	    const{taskPage} = this.state;

		fetch('http://192.168.1.176/tm-rest-api/getTask.php', {
	      method: 'post',
	      header:{
	        'Accept': 'aplication/json',
	        'Content-type': 'application/json'
	      },
	      body:JSON.stringify({
	        id: taskId,
	        page: taskPage,
	      })
	    })
		.then((response) => response.json())
		.then((responseJson) => {
			var standardDataSource = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});
			this.setState({
				isLoading: false,
				cloneTask: standardDataSource.cloneWithRows(responseJson)
			});
			
		})
	}

	render(){
		if(this.state.isLoading){
			return(
				<View>
					<ActivityIndicator />
				</View>
			)
		}

		return(
      		<View style={styles.container}>
				<ListView 
					dataSource ={this.state.cloneTask}
					renderRow={
						(rowData) => <Text>
							Id: {rowData.id}, 
							Title: {rowData.title}, 
							Description: {rowData.description}, 
							Deadline: {rowData.deadline}
						</Text>
					}
				>

				</ListView>
			</View>
		);
	}
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
});
