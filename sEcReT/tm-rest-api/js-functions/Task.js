import React from 'react';
import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
} from 'react-native';

export default class Task extends React.Component {
  render () {
    return (
        //RN uses key to keep track of anything has changed
     <View key={this.props.keyval} style={styles.note}>
        <Text style={styles.taskText}>Date: {this.props.val.date}</Text>
        <Text style={styles.taskText}>Task: {this.props.val.task}</Text>
        <Text style={styles.taskText}>Desc: {this.props.val.desc}</Text>

        <TouchableOpacity onPress={this.props.deleteMethod} style={styles.taskDelete}>
            <Text style={styles.taskDeleteText}>Delete</Text>
        </TouchableOpacity>
     </View>
    );
  }
}

const styles = StyleSheet.create({
    task: {
        position: 'relative',
        padding: 20,
        paddingRight: 100,
        borderBottomWidth: 2,
        borderBottomColor: '#ededed',
    },

    taskText: {
        paddingLeft: 20,
        borderLeftWidth: 10,
        borderLeftColor: '#E91E63',
    },

    taskDelete: {
        position: 'absolute',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#2980b9',
        padding: 10,
        top: 10,
        bottom: 10,
        right: 10,
    },
    taskDeleteText: {
        color: 'white',
    }
});
