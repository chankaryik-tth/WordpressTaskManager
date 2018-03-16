import React, {Component} from 'react';
import {
	AppRegistry,
	StyleSheet,
	Text,
	View,
	Button,
	TextInput
}from 'react-native';

export default class PostWpTasks extends Component{

	constructor(props){
		super(props)
		this.state={
			title:'',
			description:'',
			deadline:''
		}
	}

	fetchData = () =>{
		const{title} = this.state;
		const{description} = this.state;
		const{deadline} = this.state;

		fetch('http://192.168.1.176/tm-rest-api/createTask.php', {
			method: 'post',
			header:{
				'Accept': 'aplication/json',
				'Content-type': 'application/json'
			},
			body:JSON.stringify({
				taskTitle: title,
				taskDesc: description,
				taskDeadline: deadline,
			})
		})
		.then((response) => response.json)
			.then((responseJson) => {
				alert(responseJson);
			})
			.catch((error) => {
				console.error(error);
			});
	}

	render(){
		return(
      		<View style={styles.container}>
				<TextInput 
					placeholder="Enter Title"
					style={{width:200,margin:10}}
					onChangeText={title => this.setState({title})}
				/>
				<TextInput 
					placeholder="Enter Description"
					style={{width:200,margin:10}}
					onChangeText={description => this.setState({description})}
				/>

				<TextInput 
					placeholder="Enter Deadline"
					style={{width:200,margin:10}}
					onChangeText={deadline => this.setState({deadline})}
				/>

				<Button title="Submit"
				onPress={this.fetchData}
				color="magenta"/>
			</View>
		);
	}
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
});
