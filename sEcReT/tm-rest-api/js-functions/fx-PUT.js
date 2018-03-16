import React, {Component} from 'react';
import {
  AppRegistry,
  StyleSheet,
  ActivityIndicator,
  Text,
  View,
  ListView,
  Button,
  TextInput
}from 'react-native';

export default class FetchWpTasks extends Component{

  constructor(props){
    super(props);
    this.state = {
      isLoading: true,
      cloneTask: [],
      taskPage: '',
      taskId: '',
      taskTitle: '',
      taskDescription: '',
      taskDeadline: ''
    }
    
  }

  fetchData = () =>{
    const{taskId} = this.state;
    const{taskTitle} = this.state;
    const{taskDescription} = this.state;
    const{taskDeadline} = this.state;

    fetch('http://192.168.1.176/tm-rest-api/putTask.php', {
      method: 'post',
      header:{
        'Accept': 'aplication/json',
        'Content-type': 'application/json'
      },
      body:JSON.stringify({
        id: taskId,
        title: taskTitle,
        description: taskDescription,
        deadline: taskDeadline,
      })
    })
    .then((response) => response.json)
      .then((responseJson) => {
        alert("updated!");
      })
      .catch((error) => {
        console.error(error);
      });
  }

  componentDidMount(){
    const{taskPage} = this.state;
    const{taskId} = this.state;

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
       <TextInput 
          placeholder="Enter Id"
          style={{width:200,margin:10}}
          onChangeText={taskId => this.setState({taskId})}
        />
        <TextInput 
          placeholder="Enter Title"
          style={{width:200,margin:10}}
          onChangeText={taskTitle => this.setState({taskTitle})}
        />
        <TextInput 
          placeholder="Enter Description"
          style={{width:200,margin:10}}
          onChangeText={taskDescription => this.setState({taskDescription})}
        />

        <TextInput 
          placeholder="Enter Deadline"
          style={{width:200,margin:10}}
          onChangeText={taskDeadline => this.setState({taskDeadline})}
        />

        <Button title="Submit"
        onPress={this.fetchData}
        color="magenta"/>

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
